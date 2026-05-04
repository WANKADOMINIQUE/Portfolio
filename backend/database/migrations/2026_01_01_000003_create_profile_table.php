<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('headline');
            $table->string('tagline')->nullable();
            $table->text('bio_short')->nullable();
            $table->longText('bio_long')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->string('avatar')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('cv_path')->nullable();
            $table->unsignedSmallInteger('years_experience')->default(0);
            $table->unsignedInteger('projects_completed')->default(0);
            $table->unsignedInteger('happy_clients')->default(0);
            $table->json('typing_phrases')->nullable();
            $table->json('education')->nullable();
            $table->json('achievements')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
