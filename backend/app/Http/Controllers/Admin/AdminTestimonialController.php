<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Testimonial::ordered()->get()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'client_name'   => ['required', 'string', 'max:120'],
            'client_role'   => ['nullable', 'string', 'max:120'],
            'company'       => ['nullable', 'string', 'max:160'],
            'avatar'        => ['nullable', 'string'],
            'review'        => ['required', 'string'],
            'rating'        => ['nullable', 'integer', 'between:1,5'],
            'is_featured'   => ['nullable', 'boolean'],
            'is_published'  => ['nullable', 'boolean'],
            'display_order' => ['nullable', 'integer'],
        ]);
        return response()->json(['data' => Testimonial::create($data)], 201);
    }

    public function show(Testimonial $testimonial)
    {
        return response()->json(['data' => $testimonial]);
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $testimonial->update($request->only((new Testimonial)->getFillable()));
        return response()->json(['data' => $testimonial->fresh()]);
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return response()->json(['message' => 'Deleted.']);
    }
}
