<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt login
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Cek apakah email sudah terverifikasi
            if (!Auth::user()->hasVerifiedEmail()) {
                Auth::user()->sendEmailVerificationNotification();

                return redirect()->route('verification.notice')
                    ->with('error', 'Akun kamu belum terverifikasi. Silakan cek email kamu.');
            }

            // Kalau email udah terverifikasi
            $redirectTo = $request->query('r', route('home'));
            return redirect()->intended($redirectTo);
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil keluar.');
    }
}
