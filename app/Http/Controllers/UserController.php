<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function showCorrectHomepage() {
        if(auth()->check()) {
            return view('dashboard');
        }

        return view('homepage');
    }

    public function showLoginForm() {
        return view("login");
    }

    public function showRegisterForm() {
        return view('register');
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

        return redirect('/workouts')->with('success', 'Welcome back! You have successfully logged in.');
    }

    public function create(Request $request) {
        $incoming_fields = $request->validate([
            "username" => ["required", Rule::unique("users", "username")],
            "email" => ["required", "email", Rule::unique("users", "email")],
            "password" => "required|min:5|confirmed",
            "height" => "required|numeric",
            "weight" => "required|numeric",
        ]);

        $incoming_fields['password'] = bcrypt($incoming_fields['password']);
    
        $user = User::create([
            'username' => $incoming_fields['username'],
            'email' => $incoming_fields['email'],
            'password' => $incoming_fields['password'],
        ]);

        $user->userInfo()->create([
            'height' => $incoming_fields['height'],
            'weight' => $incoming_fields['weight'],
        ]);

        auth()->login($user);

        return redirect('/workouts');
    }

    public function logout() {
        auth()->logout();
        return redirect('/')->with('success', "You are now logged out!");
    }

    public function read(User $user) {
        return view("profile", ["user" => $user]);
    }
}
