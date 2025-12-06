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
        Schema::table('about_sections', function (Blueprint $table) {
            $table->dropColumn([
                'pillar1_title',
                'pillar1_description',
                'pillar1_icon',
                'pillar2_title',
                'pillar2_description',
                'pillar2_icon',
                'pillar3_title',
                'pillar3_description',
                'pillar3_icon',
                'pillar4_title',
                'pillar4_description',
                'pillar4_icon',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('about_sections', function (Blueprint $table) {
            $table->string('pillar1_title')->nullable();
            $table->text('pillar1_description')->nullable();
            $table->string('pillar1_icon')->default('file-text');
            $table->string('pillar2_title')->nullable();
            $table->text('pillar2_description')->nullable();
            $table->string('pillar2_icon')->default('lightbulb');
            $table->string('pillar3_title')->nullable();
            $table->text('pillar3_description')->nullable();
            $table->string('pillar3_icon')->default('trending-up');
            $table->string('pillar4_title')->nullable();
            $table->text('pillar4_description')->nullable();
            $table->string('pillar4_icon')->default('users');
        });
    }
};
