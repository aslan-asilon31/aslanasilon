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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('company_about')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_web')->nullable();
            $table->string('company_address')->nullable();
            $table->string('work_start')->nullable();
            $table->string('work_end')->nullable();
            $table->string('work_position')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
