<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::published()
            ->with(['category', 'tags', 'author:id,name,avatar'])
            ->latest('published_at');

        if ($q = $request->string('q')->toString()) {
            $query->where(fn ($w) => $w->where('title', 'like', "%{$q}%")
                                       ->orWhere('excerpt', 'like', "%{$q}%"));
        }
        if ($cat = $request->string('category')->toString()) {
            $query->whereHas('category', fn ($w) => $w->where('slug', $cat));
        }
        if ($tag = $request->string('tag')->toString()) {
            $query->whereHas('tags', fn ($w) => $w->where('slug', $tag));
        }

        return response()->json(['data' => $query->paginate($request->integer('per_page', 9))]);
    }

    public function recent()
    {
        return response()->json([
            'data' => Blog::published()->latest('published_at')
                ->with(['category', 'tags'])->limit(5)->get(),
        ]);
    }

    public function show(Blog $blog)
    {
        $blog->loadMissing(['category', 'tags', 'author:id,name,avatar']);
        $blog->increment('views');

        return response()->json(['data' => $blog]);
    }
}
