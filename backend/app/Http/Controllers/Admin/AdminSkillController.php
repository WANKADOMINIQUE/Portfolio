<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class AdminSkillController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Skill::ordered()->get()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'max:80'],
            'category'      => ['required', 'string', 'max:40'],
            'proficiency'   => ['nullable', 'integer', 'between:0,100'],
            'icon'          => ['nullable', 'string', 'max:80'],
            'color'         => ['nullable', 'string', 'max:32'],
            'display_order' => ['nullable', 'integer'],
            'is_active'     => ['nullable', 'boolean'],
        ]);
        return response()->json(['data' => Skill::create($data)], 201);
    }

    public function show(Skill $skill)
    {
        return response()->json(['data' => $skill]);
    }

    public function update(Request $request, Skill $skill)
    {
        $skill->update($request->only((new Skill)->getFillable()));
        return response()->json(['data' => $skill->fresh()]);
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json(['message' => 'Deleted.']);
    }
}
