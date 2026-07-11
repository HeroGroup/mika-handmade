<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(30);

        return view('admin.users', compact('users'));
    }

    public function store(UserRequest $request)
    {
        try {
            $data = $request->validated();

            User::create([
                'name' => trim(strip_tags($data['name'])),
                'email' => trim(strip_tags($data['email'])),
                'password' => Hash::make($data['password']),
                'user_type' => UserType::Admin,
                'is_active' => true,
            ]);

            return back()->with('success', 'New admin user was created successfully.');
        } catch (\Throwable $exception) {
            return back()->withErrors(['message' => $exception->getMessage()])->withInput();
        }
    }

    public function update(UserRequest $request, User $user)
    {
        try {
            if ($user->user_type !== UserType::Admin) {
                return back()->withErrors(['message' => 'You can only edit admin users.'])->withInput();
            }

            $data = $request->validated();

            $user->name = trim(strip_tags($data['name']));
            $user->email = trim(strip_tags($data['email']));
            $user->user_type = UserType::Admin;

            if (!empty($data['password'])) {
                $user->password = Hash::make($data['password']);
            }

            $user->save();

            return back()->with('success', 'Admin user updated successfully.');
        } catch (\Throwable $exception) {
            return back()->withErrors(['message' => $exception->getMessage()])->withInput();
        }
    }

    public function toggleActive(Request $request)
    {
        try {
            $user = User::find($request->id);
            if (!$user) {
                return $this->fail('Invalid user!');
            }

            $user->is_active = $request->is_active;
            $user->save();

            $status = $user->is_active ? 'activated' : 'deactivated';

            return $this->success("User $status!");
        } catch (\Throwable $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
