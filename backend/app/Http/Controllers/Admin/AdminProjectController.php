<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;

class AdminProjectController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Project::with(['category', 'images'])->latest()->paginate(20)]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'         => ['required', 'string', 'max:160'],
            'slug'          => ['nullable', 'string', 'max:180'],
            'summary'       => ['nullable', 'string'],
            'description'   => ['nullable', 'string'],
            'technologies'  => ['nullable', 'array'],
            'cover_image'   => ['nullable', 'string'],
            'github_url'    => ['nullable', 'url'],
            'live_url'      => ['nullable', 'url'],
            'category_id'   => ['nullable', 'exists:categories,id'],
            'client'        => ['nullable', 'string'],
            'completed_at'  => ['nullable', 'date'],
            'is_featured'   => ['nullable', 'boolean'],
            'is_published'  => ['nullable', 'boolean'],
            'display_order' => ['nullable', 'integer'],
        ]);
        return response()->json(['data' => Project::create($data)], 201);
    }

    public function show(Project $project)
    {
        return response()->json(['data' => $project->load(['category', 'images', 'tags'])]);
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->only((new Project)->getFillable()));
        return response()->json(['data' => $project->fresh()->load(['category', 'images', 'tags'])]);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(['message' => 'Deleted.']);
    }

    public function addImage(Request $request, Project $project)
    {
        $request->validate([
            'image'   => ['required', 'image', 'max:6144'],
            'caption' => ['nullable', 'string', 'max:200'],
        ]);
        $path = $request->file('image')->store('projects', 'public');
        $img = $project->images()->create([
            'path'    => '/storage/'.$path,
            'caption' => $request->string('caption')->toString() ?: null,
        ]);
        return response()->json(['data' => $img], 201);
    }

    public function deleteImage(Project $project, ProjectImage $image)
    {
        abort_unless($image->project_id === $project->id, 404);
        $image->delete();
        return response()->json(['message' => 'Image deleted.']);
    }
}
