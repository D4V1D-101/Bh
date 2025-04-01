<?php
namespace App\Http\Controllers\Api;

use App\Models\Games;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::select([
            'title',
            'image',
            'author',
            'content',
            'game_id'
        ])->get();
        return response()->json($articles);
    }

    public function show($id)
    {
        $article = Article::select([
            'title',
            'image',
            'author',
            'content',
            'game_id'
        ])->findOrFail($id);
        return response()->json($article);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|url',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'game_id' => 'required|integer|exists:games,id'
        ]);

        $article = Article::create($validated);

        return response()->json(['message' => 'Article Created Successfully!', 'article' => $article], 201);
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'image' => 'sometimes|nullable|url',
            'author' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'game_id' => 'sometimes|required|integer|exists:games,id'
        ]);

        $article->update($validated);

        return response()->json(['message' => 'Article Updated Successfully!', 'article' => $article]);
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response()->json(['message' => 'Article Deleted Successfully!']);
    }
}
