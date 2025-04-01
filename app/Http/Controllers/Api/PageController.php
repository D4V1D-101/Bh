<?php

namespace App\Http\Controllers\Api;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        return response()->json(Page::select(['id', 'title', 'image', 'content'])->get());
    }

    public function show($id)
    {
        return response()->json(Page::select(['id', 'title', 'image', 'content'])->findOrFail($id));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
            'content' => 'required|string'
        ]);

        $page = Page::create($validated);

        return response()->json([
            'message' => 'Page created successfully!',
            'page' => $page
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'image' => 'nullable|string|max:255',
            'content' => 'sometimes|required|string'
        ]);

        $page->update($validated);

        return response()->json([
            'message' => 'Page updated successfully!',
            'page' => $page
        ]);
    }

    public function destroy($id)
    {
        Page::findOrFail($id)->delete();

        return response()->json(['message' => 'Page deleted successfully!']);
    }
}
