<?php
// php artisan make:controller Api/GameController

// In app/Http/Controllers/Api/GameController.php
namespace App\Http\Controllers\Api;

use App\Models\Game;
use App\Models\Games;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    public function index()
    {
        $games = Games::with(['genres', 'developer', 'publisher'])->get();
        dump($games); 
        return response()->json($games);
    }

    public function show($id)
    {
        $game = Games::with(['genres', 'developer', 'publisher', 'articles'])->findOrFail($id);
        dump($game);
        return response()->json($game);
    }
}



