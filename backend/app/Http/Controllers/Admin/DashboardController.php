<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => [
                'counts' => [
                    'projects'     => Project::count(),
                    'blogs'        => Blog::count(),
                    'contacts'     => Contact::count(),
                    'unread'       => Contact::unread()->count(),
                    'testimonials' => Testimonial::count(),
                    'experiences'  => Experience::count(),
                ],
                'recent_contacts' => Contact::inbox()->latest()->limit(5)->get(),
                'recent_projects' => Project::latest()->limit(5)->get(['id', 'title', 'slug', 'created_at']),
            ],
        ]);
    }
}
