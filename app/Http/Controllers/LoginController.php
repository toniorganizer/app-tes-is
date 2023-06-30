<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            // if ($user->level == 1) {
            //     return redirect()->intended('dashboard-admin');
            // } elseif ($user->level == 2) {
            //     return redirect()->intended('dashboard-pekerja');
            // }
            return redirect()->intended('/home');
        }

        return view('dashboard/auth/login');
    }

    public function login_action(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'Username tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
            ]
        );

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            // if ($user->level == 1) {
            //     return redirect()->intended('dashboard-admin');
            // } else {
            //     return redirect()->intended('dashboard-pekerja');
            // }
            if ($user) {
                return redirect()->intended('/home');
            }
            return redirect()->intended('/login');
        }
        return back()->with('error', 'Username atau password salah');

        // return back()->withErrors([
        //     'username' => 'Username atau password yang dimasukan tidak cocok dengan data yang ada',
        // ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
