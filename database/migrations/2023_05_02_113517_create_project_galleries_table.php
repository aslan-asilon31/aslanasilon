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
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
            $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('cascade');
            $table->foreign('url_id')->references('id')->on('url_id')->onDelete('cascade');
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
