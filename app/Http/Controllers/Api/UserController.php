<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select([
            'id',
            'name',
            'email',
            'role'
        ])->get();
        dd($users);
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::select([
            'id',
            'name',
            'email',
            'role'
        ])->findOrFail($id);
        dd($user);
        return response()->json($user);
    }
}
