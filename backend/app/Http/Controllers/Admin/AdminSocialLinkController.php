<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class AdminSocialLinkController extends Controller
{
    public function index()
    {
        return response()->json(['data' => SocialLink::ordered()->get()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'platform'      => ['required', 'string', 'max:60'],
            'label'         => ['nullable', 'string', 'max:80'],
            'url'           => ['required', 'url'],
            'icon'          => ['nullable', 'string', 'max:60'],
            'color'         => ['nullable', 'string', 'max:24'],
            'is_active'     => ['nullable', 'boolean'],
            'display_order' => ['nullable', 'integer'],
        ]);
        return response()->json(['data' => SocialLink::create($data)], 201);
    }

    public function show(SocialLink $social_link)
    {
        return response()->json(['data' => $social_link]);
    }

    public function update(Request $request, SocialLink $social_link)
    {
        $social_link->update($request->only((new SocialLink)->getFillable()));
        return response()->json(['data' => $social_link->fresh()]);
    }

    public function destroy(SocialLink $social_link)
    {
        $social_link->delete();
        return response()->json(['message' => 'Deleted.']);
    }
}
