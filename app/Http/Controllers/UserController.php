<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLoginForm() {
        return view("login");
    }

    public function login(Request $request) {
        $incoming_fields = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        if(!auth()->attempt([
            "email" => $incoming_fields["email"],
            "password" => $incoming_fields["password"],
        ])) {
            return redirect('/login')->with('error', 'Invalid email or password. Please check your details and try again.');
        }

        $request->session()->regenerate();

        return redirect('/')->with('success', 'Welcome back! You have successfully logged in.');
    }
}
