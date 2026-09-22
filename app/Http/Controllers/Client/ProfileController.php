<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\SaveAddressRequest;
use App\Http\Requests\Profile\UpdateGeneralInfoRequest;
use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Models\UserAddress;
use App\Services\OrderService;
use App\Services\WishListService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show(Request $request, OrderService $orderService)
    {
        $user = $request->user();
        $address = $user?->loadMissing('address')->address;
        $orders = $orderService->getForUser($user);

        return view('client.my-account', compact('address', 'orders'));
    }

    public function updateGeneralInfo(UpdateGeneralInfoRequest $request)
    {
        $user = $request->user();
        $userData = $request->validated();

        $user->name = $userData['name'];
        $user->phone = $userData['phone'] ?? null;

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = $request->user();
        $password = $request->validated()['password'];

        $user->password = Hash::make($password);

        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }

    public function saveAddress(SaveAddressRequest $request)
    {
        $user = $request->user();

        $addressData = $request->validated();
        unset($addressData['default_address']);

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

    public function addToWishList(Request $request, WishListService $wishListService)
    {
        try {
            $user = $request->user();
            if ($user) {
                $wishListService->toggle($user, (int) $request->product_id);

                return $this->success('wish list updated successfully.');
            } else {
                return $this->fail('invalid user');
            }
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function wishList(Request $request, WishListService $wishListService)
    {
        $user = $request->user();
        $wishList = [];
        if ($user) {
            $wishList = $wishListService->getForUser($user);
        }

        return view('client.wishlist', compact('wishList'));
    }

    public function wishListCount(Request $request, WishListService $wishListService)
    {
        try {
            $user = $request->user();
            if ($user) {
                return $this->success('ok.', $wishListService->getCountAndTotal($user));
            } else {
                return $this->fail('invalid user');
            }
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
