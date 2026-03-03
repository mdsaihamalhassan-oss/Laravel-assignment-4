<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6',
            'date_of_birth' => 'required|date'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'date_of_birth' => $request->date_of_birth
        ]);

        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email','password')))
        {
            return redirect('/dashboard');
        }

        return back()->with('error','Invalid Credentials');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
