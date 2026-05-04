<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Service::ordered()->get()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'          => ['required', 'string', 'max:120'],
            'summary'        => ['nullable', 'string'],
            'description'    => ['nullable', 'string'],
            'icon'           => ['nullable', 'string'],
            'color'          => ['nullable', 'string'],
            'features'       => ['nullable', 'array'],
            'starting_price' => ['nullable', 'numeric', 'min:0'],
            'is_active'      => ['nullable', 'boolean'],
            'display_order'  => ['nullable', 'integer'],
        ]);
        return response()->json(['data' => Service::create($data)], 201);
    }

    public function show(Service $service)
    {
        return response()->json(['data' => $service]);
    }

    public function update(Request $request, Service $service)
    {
        $service->update($request->only((new Service)->getFillable()));
        return response()->json(['data' => $service->fresh()]);
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return response()->json(['message' => 'Deleted.']);
    }
}
