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

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
            $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('cascade');
            $table->foreign('url_id')->references('id')->on('urls')->onDelete('cascade');
            $table->foreign('about_id')->references('id')->on('abouts')->onDelete('cascade');
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->onDelete('cascade');
            $table->foreign('experience_id')->references('id')->on('experiences')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('social_media_id')->references('id')->on('social_medias')->onDelete('cascade');
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
