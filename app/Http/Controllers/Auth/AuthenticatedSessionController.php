<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $portal = $request->input('portal', 'client');
        $user = $request->user();

        if ($portal === 'admin') {
            if ($user?->user_type !== UserType::Admin) {
                $this->logoutAndInvalidate($request);

                throw ValidationException::withMessages([
                    'email' => 'You are not authorized to access the admin portal.',
                ]);
            }

            return redirect()->route('admin.dashboard');
        }

        return redirect('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $user?->user_type === UserType::Admin
            ? redirect('/admin/login')
            : redirect('/');
    }

    protected function logoutAndInvalidate(Request $request): void
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }
}
