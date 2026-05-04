<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::published()
            ->with(['category', 'images', 'tags'])
            ->ordered();

        if ($q = $request->string('q')->toString()) {
            $query->where(fn ($w) => $w->where('title', 'like', "%{$q}%")
                                       ->orWhere('summary', 'like', "%{$q}%"));
        }
        if ($cat = $request->string('category')->toString()) {
            $query->whereHas('category', fn ($w) => $w->where('slug', $cat));
        }
        if ($tag = $request->string('tag')->toString()) {
            $query->whereHas('tags', fn ($w) => $w->where('slug', $tag));
        }
        if ($request->boolean('featured')) {
            $query->featured();
        }

        return response()->json(['data' => $query->paginate($request->integer('per_page', 12))]);
    }

    public function featured()
    {
        return response()->json([
            'data' => Project::published()->featured()->ordered()
                ->with(['category', 'images'])->limit(6)->get(),
        ]);
    }

    public function show(Project $project)
    {
        $project->loadMissing(['category', 'images', 'tags']);
        $project->increment('views');

        return response()->json(['data' => $project]);
    }
}
