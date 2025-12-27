<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(): \Illuminate\View\View
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nim' => ['required', 'integer'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            $redirect = $user->role === 'seller'
                ? route('seller.dashboard')
                : route('buyer.dashboard');

            return redirect()->intended($redirect);
        }

        return back()->withErrors([
            'auth' => 'Username atau password tidak sesuai.',
        ])->onlyInput('username');
    }

    //logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}