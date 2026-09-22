<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\UserCart;
use Illuminate\Database\Eloquent\Collection;

class CartService
{
    public function getUserCart(int $userId): Collection
    {
        return UserCart::with([
            'product',
            'productAttribute.attributeValue.attribute',
        ])->where('user_id', $userId)->get();
    }

    public function updateCart(
        int $userId,
        int $productId,
        ?int $productAttributeId,
        string $type
    ): void {
        $product = Product::find($productId);
        if (! $product) {
            throw new \InvalidArgumentException('invalid product');
        }

        $productAttribute = null;
        if ($productAttributeId !== null) {
            $productAttribute = ProductAttribute::where('id', $productAttributeId)
                ->where('product_id', $product->id)
                ->first();

            if (! $productAttribute) {
                throw new \InvalidArgumentException('invalid product variant');
            }

            if ((int) $productAttribute->quantity < 1) {
                throw new \RuntimeException('out of stock');
            }
        }

        $query = UserCart::where('user_id', $userId)
            ->where('product_id', $product->id);

        if ($productAttribute) {
            $query->where('product_attribute_id', $productAttribute->id);
        } else {
            $query->whereNull('product_attribute_id');
        }

        $cartItem = $query->first();

        if ($type === 'inc') {
            if ($cartItem) {
                $cartItem->increment('count');
            } else {
                UserCart::create([
                    'user_id' => $userId,
                    'product_id' => $product->id,
                    'product_attribute_id' => $productAttribute?->id,
                    'count' => 1,
                ]);
            }
        } elseif ($type === 'dec' && $cartItem) {
            if ((int) $cartItem->count > 1) {
                $cartItem->decrement('count');
            } else {
                $cartItem->delete();
            }
        }
    }
}