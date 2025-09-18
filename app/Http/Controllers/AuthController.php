<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function store_register(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('dashboard');

    }

    public function store_login(Request $request)
    {
        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('success', 'email atau password anda salah');
        }
    }

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

     function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
}
