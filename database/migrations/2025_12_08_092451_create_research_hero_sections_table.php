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
        Schema::create('research_hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge_text')->default('Research Library');
            $table->string('title_line1')->default('Explore Our');
            $table->string('title_line2')->default('Research');
            $table->text('subtitle')->default('Evidence-based insights shaping policy, innovation, and sustainable development');
            $table->string('background_image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_hero_sections');
    }
};
