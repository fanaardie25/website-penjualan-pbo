<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use SweetAlert2\Laravel\Swal;
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
            Swal::fire([
                'title' => 'Success !',
                'position' => 'top-end',
                'text'  => 'Login successfully',
                'icon'  => 'success',
                'timer' => '3000',
                'toast' => true,
                'showConfirmButton' => false,
                'timerProgressBar' => true,
            ]);
            return redirect()->route('dashboard');
        } else {
            Swal::fire([
                'title' => 'Error !',
                'position' => 'top-end',
                'text'  => 'Login failed',
                'icon'  => 'error',
                'timer' => '3000',
                'toast' => true,
                'showConfirmButton' => false,
                'timerProgressBar' => true,
            ]);
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
