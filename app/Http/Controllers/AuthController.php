<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Process login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {

            $request->session()->regenerate();

            $user = Auth::user();

            $destination = match ($user->role) {
                'admin' => '/admin/dashboard',
                'staff' => '/staff/dashboard',
                default => '/menu',
            };

            return redirect()->intended($destination);
        }

        // 6. Authentication failed
        return back()
            ->withErrors([
                'username' => 'Invalid username or password.',
            ])
            ->onlyInput('username');
    }
    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
}

}