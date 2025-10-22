<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(30);
        return view('admin.users', compact('users'));
    }

    public function toggleActive(Request $request) {
        try {
            $user = User::find($request->id);
            $user->is_active = $request->is_active;
            $user->save();

            $status = $user->is_active ? 'activated' : 'deactivated';

            return $this->success('User ' . $status . '!');
        } catch (\Exeption $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
