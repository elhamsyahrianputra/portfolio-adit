<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registration()
    {
        return view('auth.signup', [
            'title' => 'Daftar | Baswara',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|max:255',
        ]);

        $data['name'] = Str::title($data['name']);
        $data['email'] = Str::lower($data['email']);
        $data['password'] = hash::make($data['password']);

        User::create($data);

        return redirect('/login');
    }

    public function login()
    {
        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'loginError' => 'Sorry, your email or password is incorrect',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
