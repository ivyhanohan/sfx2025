<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'email|required',
            'password' => 'string|required'
        ]);

        $login = Auth::attempt($request->only('email','password'));

        if($login) return redirect('/products');

        return back();
    }

    public function registrationForm() {
        return view('/register');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
