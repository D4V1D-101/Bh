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
            return "Felhasználó nem található ezzel az email címmel: {$email}";
        }


        if (!$user->isAdmin()) {
            return "A felhasználó nem admin: {$email}";
        }


        if (Hash::check($password, $user->password)) {
            return "Hibás jelszó a következő felhasználóhoz: {$email}";
        }


        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        if (Auth::attempt($credentials)) {
            return "Sikeres bejelentkezés mint: " . Auth::user()->name;
        } else {
            return "Auth::attempt sikertelen. Ellenőrizd a log fájlokat további információért.";
        }
    }
}
