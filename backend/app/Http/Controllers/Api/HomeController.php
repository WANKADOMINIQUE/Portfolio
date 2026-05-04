<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\SocialLink;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => [
                'profile'           => Profile::first(),
                'skills'            => Skill::active()->ordered()->get(),
                'experiences'       => Experience::ordered()->limit(5)->get(),
                'services'          => Service::active()->ordered()->limit(6)->get(),
                'featured_projects' => Project::published()->featured()->ordered()
                                              ->with(['category', 'images'])->limit(6)->get(),
                'testimonials'      => Testimonial::published()->ordered()->limit(6)->get(),
                'recent_blogs'      => Blog::published()->latest('published_at')
                                            ->with(['category', 'tags'])->limit(3)->get(),
                'social_links'      => SocialLink::active()->ordered()->get(),
            ],
        ]);
    }
}
