<?php

namespace App\Services;

use App\Models\User;
use App\Models\WishList;
use Illuminate\Database\Eloquent\Collection;

class WishListService
{
    public function toggle(User $user, int $productId): void
    {
        $wishListItem = WishList::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($wishListItem) {
            $wishListItem->delete();

            return;
        }

        WishList::create([
            'user_id' => $user->id,
            'product_id' => $productId,
        ]);
    }

    public function getForUser(User $user): Collection
    {
        return WishList::with('product')
            ->where('user_id', $user->id)
            ->get();
    }

    public function getCountAndTotal(User $user): array
    {
      $userWishListQuery = WishList::where('user_id', $user->id);
        return [
            'count' => $userWishListQuery->count(),
            'sum' => $userWishListQuery
                ->join('products', 'wish_lists.product_id', 'products.id')
                ->sum('price'),
        ];
    }
}