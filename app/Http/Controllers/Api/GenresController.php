<?php

namespace App\Http\Controllers\Api;

use App\Models\Genres;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenresController extends Controller
{
    public function index()
    {
        return response()->json(Genres::select(['id', 'name', 'slug'])->get());
    }

    public function show($id)
    {
        return response()->json(Genres::select(['id', 'name', 'slug'])->findOrFail($id));
    }

}
