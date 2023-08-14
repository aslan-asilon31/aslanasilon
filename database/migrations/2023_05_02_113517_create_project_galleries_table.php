<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('gallery_id');
            $table->unsignedBigInteger('technology_id');
            $table->unsignedBigInteger('url_id');
            $table->unsignedBigInteger('about_id');
            $table->unsignedBigInteger('portfolio_id');
            $table->unsignedBigInteger('experience_id');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('social_media_id');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_galleries');
    }
};
