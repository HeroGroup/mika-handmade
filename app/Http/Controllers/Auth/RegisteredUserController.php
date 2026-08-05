<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function store(RegisterRequest $request): RedirectResponse
    {
        $user = User::create([
            'name' => $request->string('name')->trim(),
            'email' => $request->string('email')->lower(),
            'phone' => $request->string('phone')->trim(),
            'password' => Hash::make($request->string('password')),
            'user_type' => UserType::Client,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }
}
