<?php

namespace App\Http\Controllers\Api;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function index()
    {
        return response()->json(Member::select(['id', 'name', 'designation', 'git_url', 'linkedin_url', 'image'])->get());
    }

    public function show($id)
    {
        return response()->json(Member::select(['id', 'name', 'designation', 'git_url', 'linkedin_url', 'image'])->findOrFail($id));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'git_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'image' => 'nullable|string|max:255'
        ]);

        $member = Member::create($validated);

        return response()->json([
            'message' => 'Member created successfully!',
            'member' => $member
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'designation' => 'sometimes|required|string|max:255',
            'git_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'image' => 'nullable|string|max:255'
        ]);

        $member->update($validated);

        return response()->json([
            'message' => 'Member updated successfully!',
            'member' => $member
        ]);
    }

    public function destroy($id)
    {
        Member::findOrFail($id)->delete();

        return response()->json(['message' => 'Member deleted successfully!']);
    }
}
