<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile';

    protected $fillable = [
        'full_name', 'headline', 'tagline', 'bio_short', 'bio_long',
        'email', 'phone', 'location', 'avatar', 'cover_image', 'cv_path',
        'years_experience', 'projects_completed', 'happy_clients',
        'typing_phrases', 'education', 'achievements',
    ];

    protected $casts = [
        'typing_phrases' => 'array',
        'education' => 'array',
        'achievements' => 'array',
        'years_experience' => 'integer',
        'projects_completed' => 'integer',
        'happy_clients' => 'integer',
    ];
}
