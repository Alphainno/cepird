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
        // Create program_sections table
        Schema::create('program_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('badge_text')->nullable();
            $table->text('description')->nullable();
            $table->string('color_theme')->default('blue'); // blue, teal, amber, indigo
            $table->string('section_id')->nullable(); // For anchor links
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Create program_items table
        Schema::create('program_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_section_id')->constrained('program_sections')->onDelete('cascade');
            $table->string('title');
            $table->string('icon')->nullable();
            $table->string('duration')->nullable();
            $table->text('description')->nullable();
            $table->string('features_title')->default('Key Features:');
            $table->json('features')->nullable(); // Array of feature strings
            $table->json('metadata')->nullable(); // Additional info like target, cohort, prize pool, etc.
            $table->string('info_label')->nullable(); // e.g., "Next Cohort", "Papers Published"
            $table->string('info_value')->nullable(); // e.g., "Jan 2025", "120+"
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_items');
        Schema::dropIfExists('program_sections');
    }
};
