<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CLogin extends Controller
{
    // Show the login form or redirect if authenticated
    public function index()
    {
        // If the user is already logged in, redirect to the main page
        if (Auth::check()) {
            return redirect()->route('main2'); // Ensure 'main' route is defined for authenticated users
        }

        return view('login.login-form');
    }

    // Process the login form
    public function login_proses(Request $request) 
    { 
        $request->validate([ 
            'username'  => 'required', 
            'password'  => 'required', 
        ], [ 
            'username.required' => 'Username wajib diisi', 
            'password.required' => 'Password wajib diisi', 
        ]); 
 
        $credentials = $request->only('username', 'password'); 
 
        if (!Auth::attempt($credentials)) { 
            return redirect()->route('login')->withErrors(['password' => 'Username atau Password Salah']); 
        }

        // Redirect to the main page or dashboard on successful login
        return redirect()->route('main2')->with('success', "Selamat Datang di Halaman IT"); 
    }

    // Logout function
    public function logout() 
    { 
        Auth::logout(); 
        return redirect()->route('login')->with('logout', 'Berhasil Logout'); 
    } 
}
