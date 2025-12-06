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
        Schema::create('focus_area_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge_text')->nullable(); // e.g., 'What We Focus On'
            $table->string('title')->nullable(); // e.g., 'Core Focus Areas'
            $table->text('subtitle')->nullable(); // Description under title
            $table->text('quote')->nullable(); // The quote at the bottom
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('focus_area_sections');
    }
};
