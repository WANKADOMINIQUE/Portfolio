<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Blog::with(['category', 'tags', 'author:id,name'])->latest()->paginate(15),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id'      => ['nullable', 'exists:categories,id'],
            'title'            => ['required', 'string', 'max:200'],
            'excerpt'          => ['nullable', 'string'],
            'content'          => ['required', 'string'],
            'featured_image'   => ['nullable', 'string'],
            'status'           => ['nullable', 'in:draft,published,archived'],
            'published_at'     => ['nullable', 'date'],
            'meta_title'       => ['nullable', 'string', 'max:200'],
            'meta_description' => ['nullable', 'string', 'max:300'],
            'meta_keywords'    => ['nullable', 'string', 'max:255'],
            'og_image'         => ['nullable', 'string'],
            'is_featured'      => ['nullable', 'boolean'],
        ]);
        $data['user_id'] = $request->user()->id;
        return response()->json(['data' => Blog::create($data)], 201);
    }

    public function show(Blog $blog)
    {
        return response()->json(['data' => $blog->load(['category', 'tags', 'author:id,name'])]);
    }

    public function update(Request $request, Blog $blog)
    {
        $blog->update($request->only((new Blog)->getFillable()));
        return response()->json(['data' => $blog->fresh()->load(['category', 'tags'])]);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json(['message' => 'Deleted.']);
    }
}
