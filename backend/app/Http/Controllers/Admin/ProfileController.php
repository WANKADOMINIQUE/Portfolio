<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return response()->json(['data' => Profile::firstOrCreate(
            ['id' => 1],
            ['full_name' => 'Your Name', 'headline' => 'Software Engineer', 'email' => 'you@example.com']
        )]);
    }

    public function update(Request $request)
    {
        $profile = Profile::firstOrCreate(['id' => 1], ['full_name' => 'Your Name', 'headline' => '', 'email' => '']);
        $profile->update($request->only((new Profile)->getFillable()));

        return response()->json(['data' => $profile->fresh()]);
    }

    public function uploadAvatar(Request $request)
    {
        $request->validate(['avatar' => ['required', 'image', 'max:4096']]);
        $path = $request->file('avatar')->store('avatars', 'public');
        $profile = Profile::firstOrFail();
        $profile->update(['avatar' => '/storage/'.$path]);

        return response()->json(['data' => $profile->fresh()]);
    }

    public function uploadCv(Request $request)
    {
        $request->validate(['cv' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:8192']]);
        $path = $request->file('cv')->store('cv', 'public');
        $profile = Profile::firstOrFail();
        $profile->update(['cv_path' => '/storage/'.$path]);

        return response()->json(['data' => $profile->fresh()]);
    }
}
