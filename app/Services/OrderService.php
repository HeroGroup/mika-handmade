<?php

namespace App\Services;

use App\Enums\OrderPaymentStatus;
use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\UserCart;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderService
{
    public function __construct(private PaymentService $paymentService) {}

    public function getForUser(User $user): LengthAwarePaginator
    {
        return Order::with('items')
            ->where('user_id', $user->id)
            ->latest()
            ->paginate(10);
    }

    public function getForAdmin(): LengthAwarePaginator
    {
        return Order::with('user')
            ->latest()
            ->paginate(30);
    }

    public function findForAdmin(int $orderId): Order
    {
        return Order::with([
            'user',
            'items.product.images',
            'items.productAttribute.attributeValue.attribute',
            'payment',
        ])->findOrFail($orderId);
    }

    public function updateStatus(Order $order, OrderStatus $status): Order
    {
        $order->update(['status' => $status]);

        return $order->refresh();
    }

    public function findForUser(User $user, int $orderId): ?Order
    {
        return Order::with([
            'user',
            'items.product',
            'items.productAttribute.attributeValue.attribute',
            'payment',
        ])
            ->where('user_id', $user->id)
            ->whereKey($orderId)
            ->firstOrFail();
    }

    public function createFromCart(
        User $user,
        Collection $cartItems,
        array $address,
        $discountAmount = 0,
        $discountCode = null,
        PaymentMethod $paymentMethod = PaymentMethod::Manual
    ): Order {
        return DB::transaction(function () use (
            $cartItems,
            $user,
            $address,
            $discountAmount,
            $discountCode,
            $paymentMethod
        ) {
            $order = Order::create([
                'user_id' => $user->id,
                'shipping_address_snapshot' => $address,
                'total_amount' => 0,
                'status' => OrderStatus::Pending,
                'payment_status' => OrderPaymentStatus::Pending,
            ]);

            $total = $this->createOrderItems($cartItems, $order->id);
            $discount = (string) ($discountAmount ?? 0);
            $grandTotal = bcsub($total, $discount, 2);

            if (bccomp($grandTotal, '0', 2) === -1) {
                $grandTotal = '0.00';
            }

            $order->update([
                'total_amount' => $grandTotal,
                'discount_amount' => $discount,
                'discount_code' => $discountCode,
            ]);

            $this->paymentService->process($order->id, $grandTotal, $paymentMethod);

            $order->update([
                'payment_status' => OrderPaymentStatus::Paid,
                'status' => OrderStatus::Processing,
            ]);

            UserCart::where('user_id', $user->id)->delete();

            return $order;
        });
    }

    private function createOrderItems(Collection $cartItems, int $orderId): string
    {
        $total = '0.00';

        foreach ($cartItems as $cart) {
            $unitPrice = $cart->productAttribute
                ? $cart->productAttribute->price
                : ($cart->product->price ?? 0);
            $quantity = (int) $cart->count;
            $subtotal = bcmul((string) $unitPrice, (string) $quantity, 2);
            $total = bcadd($total, $subtotal, 2);

            OrderItem::create([
                'order_id' => $orderId,
                'product_id' => $cart->product_id,
                'product_attribute_id' => $cart->product_attribute_id,
                'title' => $cart->product->title ?? null,
                'unit_price' => $unitPrice,
                'quantity' => $quantity,
                'subtotal' => $subtotal,
            ]);

            if ($cart->productAttribute) {
                try {
                    $cart->productAttribute->decreaseStock($quantity);
                } catch (\Throwable $e) {
                    Log::warning('Stock decrease failed: ' . $e->getMessage());
                    throw $e;
                }
            }
        }

        return $total;
    }
}