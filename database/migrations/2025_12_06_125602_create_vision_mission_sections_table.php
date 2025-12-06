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
        Schema::create('vision_mission_sections', function (Blueprint $table) {
            $table->id();
            
            // Vision fields
            $table->string('vision_icon')->default('🎯');
            $table->string('vision_title')->default('Our Vision');
            $table->text('vision_paragraph1')->nullable();
            $table->text('vision_paragraph2')->nullable();
            
            // Mission fields
            $table->string('mission_icon')->default('📌');
            $table->string('mission_title')->default('Our Mission');
            $table->text('mission_point1')->nullable();
            $table->text('mission_point2')->nullable();
            $table->text('mission_point3')->nullable();
            $table->text('mission_point4')->nullable();
            $table->text('mission_point5')->nullable();
            
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vision_mission_sections');
    }
};
