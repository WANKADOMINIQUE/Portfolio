<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Service::active()->ordered()->get()]);
    }

    public function show(Service $service)
    {
        return response()->json(['data' => $service]);
    }
}
