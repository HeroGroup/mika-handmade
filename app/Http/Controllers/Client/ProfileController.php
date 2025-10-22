<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        return view('client.my-account');
    }

    public function updateGeneralInfo(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if (! $user) {
            return back()->withErrors(['message' => 'User not found!'])->withInput();
        }

        $user->name = $request->name;
        $user->phone = $request->phone;

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if (! $user) {
            return back()->withErrors(['message' => 'User not found!']);
        }

        $user->makeVisible(['password']);

        if (! $request->password) {
            return back();
        }

        if ($request->password != $request->password_confirmation) {
            return back()->withErrors(['message' => 'Password and Password Confirmation does not match.']);
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }

    public function addToWishList(Request $request)
    {
        try {
            $userId = auth()->user()?->id;
            if ($userId) {
                $item_exists = WishList::where('user_id', $userId)
                    ->where('product_id', $request->product_id)
                    ->first();

                if ($item_exists) {
                    WishList::where('user_id', $userId)
                        ->where('product_id', $request->product_id)
                        ->delete();

                } else {
                    WishList::create([
                        'user_id' => $userId,
                        'product_id' => $request->product_id,
                    ]);
                }

                return $this->success('wish list updated successfully.');
            } else {
                return $this->fail('invalid user');
            }
        } catch (\Exeption $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function wishList()
    {
        $userId = auth()->user()?->id;
        $wishList = [];
        if ($userId) {
            $wishList = WishList::with('product')->where('user_id', $userId)->get();
        }

        return view('client.wishlist', compact('wishList'));
    }

    public function wishListCount()
    {
        try {
            $userId = auth()->user()?->id;
            if ($userId) {
                $wishListCount = WishList::where('user_id', $userId)->count();
                $wishListTotal = WishList::where('user_id', $userId)->join('products', 'wish_lists.product_id', 'products.id')->sum('price');

                return $this->success('ok.', ['count' => $wishListCount, 'sum' => $wishListTotal]);
            } else {
                return $this->fail('invalid user');
            }
        } catch (\Exeption $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
