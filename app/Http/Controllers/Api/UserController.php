<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::select(['id', 'name', 'email', 'role'])->get());
    }

    public function show($id)
    {
        return response()->json(User::select(['id', 'name', 'email', 'role'])->findOrFail($id));
    }

}
