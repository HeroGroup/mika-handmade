<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $address = $user?->loadMissing('address')->address;

        return view('client.my-account', compact('address'));
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

    public function saveAddress(Request $request)
    {
        $user = auth()->user();

        if (! $user) {
            return back()->withErrors(['message' => 'User not found!']);
        }

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address_1' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'post_code' => ['required', 'string', 'max:50'],
            'country' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
        ]);

        $addressData = $request->only([
            'first_name',
            'last_name',
            'company',
            'address_1',
            'address_2',
            'city',
            'post_code',
            'country',
            'state',
        ]);

        $addressData['default_address'] = (bool) $request->boolean('default_address');

        $address = $user->address()->first();

        if ($address) {
            $address->update($addressData);
        } else {
            $addressData['user_id'] = $user->id;
            $address = UserAddress::create($addressData);
        }

        return back()->with('success', 'Address saved successfully.');
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
        } catch (\Exception $exception) {
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
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
