<?php

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminExperienceController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminSkillController;
use App\Http\Controllers\Admin\AdminSocialLinkController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\SocialLinkController;
use App\Http\Controllers\Api\TestimonialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public API (no auth)
|--------------------------------------------------------------------------
*/
Route::prefix('v1')->group(function () {
    Route::get('home', [HomeController::class, 'index']);
    Route::get('profile', [ProfileController::class, 'show']);

    Route::get('skills', [SkillController::class, 'index']);
    Route::get('experiences', [ExperienceController::class, 'index']);
    Route::get('services', [ServiceController::class, 'index']);
    Route::get('services/{service:slug}', [ServiceController::class, 'show']);

    Route::get('projects', [ProjectController::class, 'index']);
    Route::get('projects/featured', [ProjectController::class, 'featured']);
    Route::get('projects/{project:slug}', [ProjectController::class, 'show']);

    Route::get('testimonials', [TestimonialController::class, 'index']);

    Route::get('blogs', [BlogController::class, 'index']);
    Route::get('blogs/recent', [BlogController::class, 'recent']);
    Route::get('blogs/{blog:slug}', [BlogController::class, 'show']);

    Route::get('social-links', [SocialLinkController::class, 'index']);

    Route::post('contact', [ContactController::class, 'store'])
        ->middleware('throttle:5,1');

    // Auth
    Route::post('auth/login', [AuthController::class, 'login'])
        ->middleware('throttle:6,1');
});

/*
|--------------------------------------------------------------------------
| Authenticated admin API
|--------------------------------------------------------------------------
*/
Route::prefix('v1/admin')->middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('auth/logout', [AuthController::class, 'logout']);

    Route::get('dashboard', [DashboardController::class, 'index']);

    // Profile (singleton)
    Route::get('profile', [AdminProfileController::class, 'show']);
    Route::put('profile', [AdminProfileController::class, 'update']);
    Route::post('profile/avatar', [AdminProfileController::class, 'uploadAvatar']);
    Route::post('profile/cv', [AdminProfileController::class, 'uploadCv']);

    Route::apiResource('skills', AdminSkillController::class);
    Route::apiResource('experiences', AdminExperienceController::class);
    Route::apiResource('projects', AdminProjectController::class);
    Route::post('projects/{project}/images', [AdminProjectController::class, 'addImage']);
    Route::delete('projects/{project}/images/{image}', [AdminProjectController::class, 'deleteImage']);

    Route::apiResource('services', AdminServiceController::class);
    Route::apiResource('testimonials', AdminTestimonialController::class);
    Route::apiResource('blogs', AdminBlogController::class);
    Route::apiResource('social-links', AdminSocialLinkController::class);

    // Contacts inbox
    Route::get('contacts', [AdminContactController::class, 'index']);
    Route::get('contacts/{contact}', [AdminContactController::class, 'show']);
    Route::patch('contacts/{contact}/read', [AdminContactController::class, 'markRead']);
    Route::patch('contacts/{contact}/archive', [AdminContactController::class, 'archive']);
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy']);
});
