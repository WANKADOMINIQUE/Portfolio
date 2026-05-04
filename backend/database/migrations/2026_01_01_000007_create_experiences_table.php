<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('role');
            $table->string('location')->nullable();
            $table->string('employment_type')->nullable(); // full-time, contract, freelance
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_current')->default(false);
            $table->longText('description')->nullable();
            $table->json('technologies')->nullable();
            $table->json('highlights')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('company_url')->nullable();
            $table->unsignedInteger('display_order')->default(0);
            $table->timestamps();

            $table->index(['is_current', 'start_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
