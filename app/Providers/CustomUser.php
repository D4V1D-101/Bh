<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomUser extends Controller
{
    public function debugLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');


        $user = User::where('email', $email)->first();

        if (!$user) {
            return "This user is not found with this email: {$email}";
        }


        if (!$user->isAdmin()) {
            return "The user is not admin: {$email}";
        }


        if (Hash::check($password, $user->password)) {
            return "Wrong Password for this user: {$email}";
        }


        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        if (Auth::attempt($credentials)) {
            return "Login successful as: " . Auth::user()->name;
        } else {
            return "Auth::attempt error.";
        }
    }
}
