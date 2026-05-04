<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;

class SocialLinkController extends Controller
{
    public function index()
    {
        return response()->json(['data' => SocialLink::active()->ordered()->get()]);
    }
}
