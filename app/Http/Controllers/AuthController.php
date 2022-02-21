<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function save(Request $request)
    {
        if(Auth::check()){
            return redirect(route('notes.index'));
        }

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if($user){
            Auth::login($user);
            return redirect(route('notes.index'));
        }
        return redirect(route('auth.register'))->withErrors([
            'email' => 'Wrong email or password. Try again!',
            'password' => 'Wrong email or password. Try again!'
        ]);
    }

    public function login(Request $request)
    {
        if(Auth::check()){
            return redirect(route('notes.index'));
        }
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only(['email', 'password']))){
            return redirect()->intended(route('notes.index'));
        }

        return redirect(route('auth.login'))->withErrors([
            'email' => 'Wrong email',
            'password' => 'Wrong password'
        ]);
    }
}
