<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class AdminExperienceController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Experience::ordered()->get()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company'         => ['required', 'string', 'max:120'],
            'role'            => ['required', 'string', 'max:120'],
            'location'        => ['nullable', 'string', 'max:120'],
            'employment_type' => ['nullable', 'string', 'max:40'],
            'start_date'      => ['required', 'date'],
            'end_date'        => ['nullable', 'date', 'after_or_equal:start_date'],
            'is_current'      => ['nullable', 'boolean'],
            'description'     => ['nullable', 'string'],
            'technologies'    => ['nullable', 'array'],
            'highlights'      => ['nullable', 'array'],
            'company_logo'    => ['nullable', 'string'],
            'company_url'     => ['nullable', 'url', 'max:255'],
            'display_order'   => ['nullable', 'integer'],
        ]);
        return response()->json(['data' => Experience::create($data)], 201);
    }

    public function show(Experience $experience)
    {
        return response()->json(['data' => $experience]);
    }

    public function update(Request $request, Experience $experience)
    {
        $experience->update($request->only((new Experience)->getFillable()));
        return response()->json(['data' => $experience->fresh()]);
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return response()->json(['message' => 'Deleted.']);
    }
}
