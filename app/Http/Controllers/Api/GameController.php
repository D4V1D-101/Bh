<?php
namespace App\Http\Controllers\Api;

use App\Models\Games;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    public function index()
    {
        $games = Games::select([
            'name',
            'short_desc',
            'exe_name',
            'description',
            'image_path',
            'release_date',
            'download_link',
            'developer_id',
            'publisher_id'
        ])->get();

        return response()->json($games);
    }

    public function show($id)
    {
        $game = Games::select([
            'name',
            'short_desc',
            'exe_name',
            'description',
            'image_path',
            'release_date',
            'download_link',
            'developer_id',
            'publisher_id'
        ])->findOrFail($id);

        return response()->json($game);
    }
}
