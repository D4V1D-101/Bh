<?php
namespace App\Http\Controllers\Api;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        return response()->json(Faq::select(['question', 'answer'])->get());
    }

    public function show($id)
    {
        return response()->json(Faq::select(['question', 'answer'])->findOrFail($id));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255'
        ]);

        $faq = Faq::create($validated);

        return response()->json([
            'message' => 'FAQ created successfully!',
            'faq' => $faq
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255'
        ]);

        $faq->update($validated);

        return response()->json([
            'message' => 'FAQ updated successfully!',
            'faq' => $faq
        ]);
    }

    public function destroy($id)
    {
        Faq::findOrFail($id)->delete();

        return response()->json(['message' => 'FAQ deleted successfully!']);
    }
}
