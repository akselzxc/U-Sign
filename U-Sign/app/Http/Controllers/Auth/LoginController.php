<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $redirectTo = '/Fr_dashboard';

            // If this was an Inertia (XHR) request, force a full page reload.
            // This avoids CSRF/session race conditions when the session ID is regenerated.
            return $request->header('X-Inertia')
                ? Inertia::location($redirectTo)
                : redirect()->intended($redirectTo);
        }

        throw ValidationException::withMessages([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }

    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    $redirectTo = '/login_frontline';

    return $request->header('X-Inertia')
        ? Inertia::location($redirectTo)
        : redirect($redirectTo);
}
}