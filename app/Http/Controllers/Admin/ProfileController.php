<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        try {
            $user = User::find(auth()->user()->id);
            if (! $user) {
                return back()->withErrors(['message' => 'User not found.']);
            }

            return view('admin.profile', compact('user'));

        } catch (\Exeption $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $user = User::find(auth()->user()->id);
            if (! $user) {
                return back()->withErrors(['message' => 'User not found!'])->withInput();
            }

            $user->makeVisible(['password']);

            if ($request->current_password && ! Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['message' => 'current password is incorrect!'])->withInput();
            }

            if ($request->password && $request->password != $request->password_confirmation) {
                return back()->withErrors(['message' => 'Password and Password Confirmation does not match.'])->withInput();
            }

            $user->name = $request->name;
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            return back()->with('success', 'Profile updated successfully.');

        } catch (\Exeption $exception) {
            return back()->withErrors(['message' => $exception->getMessage()])->withInput();
        }
    }
}
