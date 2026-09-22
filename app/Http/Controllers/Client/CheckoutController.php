<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Enums\PaymentMethod;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show(Request $request, CartService $cartService)
    {
        $user = $request->user();
        $cartItems = $cartService->getUserCart($user->id);

        if ($cartItems->isEmpty()) {
            return redirect()->route('client.cart')
                ->withErrors(['message' => 'Cart is empty']);
        }

        $address = $user->address;

        return view('client.checkout', compact('user', 'cartItems', 'address'));
    }

    public function checkout(
        StoreOrderRequest $request,
        OrderService $orderService,
        CartService $cartService
    )
    {
        $user = $request->user();

        $cartItems = $cartService->getUserCart($user->id);

        if ($cartItems->isEmpty()) {
            return redirect()->route('client.cart')
                ->withErrors(['message' => 'Cart is empty']);
        }

        $address = $request->safe()->only([
            'first_name',
            'last_name',
            'address_1',
            'city',
            'post_code',
            'country',
            'state',
        ]);

        $order = $orderService->createFromCart(
            $user,
            $cartItems,
            $address,
            $request->validated()['discount_amount'] ?? 0,
            $request->validated()['discount_code'] ?? null,
            PaymentMethod::tryFrom($request->input('payment_method', PaymentMethod::Manual->value))
                ?? PaymentMethod::Manual
        );

        return view('client.order-summary', ['order' => $order->load('items', 'payment')]);
    }
}
