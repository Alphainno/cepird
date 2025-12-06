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
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('main_title');
            $table->text('subtitle');
            $table->boolean('is_active')->default(true);

            // Pillar 1
            $table->string('pillar1_title');
            $table->text('pillar1_description');
            $table->string('pillar1_icon')->default('file-text');

            // Pillar 2
            $table->string('pillar2_title');
            $table->text('pillar2_description');
            $table->string('pillar2_icon')->default('lightbulb');

            // Pillar 3
            $table->string('pillar3_title');
            $table->text('pillar3_description');
            $table->string('pillar3_icon')->default('trending-up');

            // Pillar 4
            $table->string('pillar4_title');
            $table->text('pillar4_description');
            $table->string('pillar4_icon')->default('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
