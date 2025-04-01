<?php
namespace App\Http\Controllers\Api;

use App\Models\Games;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    public function index()
    {
        return response()->json(Games::select([
            'name',
            'short_desc',
            'exe_name',
            'description',
            'image_path',
            'release_date',
            'download_link',
            'developer_id',
            'publisher_id'
        ])->get());
    }

    public function show($id)
    {
        return response()->json(Games::select([
            'name',
            'short_desc',
            'exe_name',
            'description',
            'image_path',
            'release_date',
            'download_link',
            'developer_id',
            'publisher_id'
        ])->findOrFail($id));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_desc' => 'required|string|max:255',
            'exe_name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'required|string|max:255',
            'release_date' => 'required|date',
            'download_link' => 'required|string|max:255',
            'developer_id' => 'required|integer|exists:developers,id',
            'publisher_id' => 'required|integer|exists:publishers,id',
        ]);

        $game = Games::create($validated);

        return response()->json([
            'data' => $game,
            'message' => 'Game created successfully!'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $game = Games::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'short_desc' => 'sometimes|required|string|max:255',
            'exe_name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',

        ]);

        $game->update($validated);

        return response()->json([
            'message' => 'Game updated successfully!',
            'game' => $game
        ]);
    }

}
