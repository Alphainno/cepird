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
        // Section header/description table
        Schema::create('program_impact_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge_text')->default('Measurable Impact');
            $table->string('title')->default('Programs by the Numbers');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Individual impact stats
        Schema::create('program_impact_stats', function (Blueprint $table) {
            $table->id();
            $table->string('value'); // e.g., "50+", "1,200+"
            $table->string('label'); // e.g., "Research Publications"
            $table->string('description')->nullable(); // e.g., "Evidence-based studies driving policy"
            $table->string('color_theme')->default('blue'); // blue, teal, amber, indigo
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
        Schema::dropIfExists('program_impact_stats');
        Schema::dropIfExists('program_impact_sections');
    }
};
