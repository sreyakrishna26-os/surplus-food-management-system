<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.Login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        // Check username and password
        $request->authenticate();

        // Regenerate session after successful login
        $request->session()->regenerate();

        // Get logged-in user
        $user = Auth::user();

        // Get user role
        $role = strtolower(trim($user->role));

        // Admin login
        if ($role === 'admin') {
            return redirect()->route('Adminhome');
        }

        // Donor login
        if ($role === 'donor') {
            return redirect()->route('Donorhome');
        }

        // Buyer login
        if ($role === 'buyer') {
            return redirect()->route('Buyerhome');
        }

        // If role is invalid
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->withErrors([
                'Username' => 'Invalid user role.',
            ]);
    }

    public function destroy(Request $request): RedirectResponse
    {
        // Logout user
        Auth::guard('web')->logout();

        // Clear session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Redirect to GUEST PAGE
        return redirect('/');
    }
}