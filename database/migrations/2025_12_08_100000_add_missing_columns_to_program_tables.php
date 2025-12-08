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
        // Add missing columns to program_sections
        Schema::table('program_sections', function (Blueprint $table) {
            if (!Schema::hasColumn('program_sections', 'slug')) {
                $table->string('slug')->nullable()->after('title');
            }
            if (!Schema::hasColumn('program_sections', 'section_id')) {
                $table->string('section_id')->nullable()->after('color_theme');
            }
        });

        // Add missing columns to program_items
        Schema::table('program_items', function (Blueprint $table) {
            if (!Schema::hasColumn('program_items', 'duration')) {
                $table->string('duration')->nullable()->after('icon');
            }
            if (!Schema::hasColumn('program_items', 'features_title')) {
                $table->string('features_title')->default('Key Features:')->after('description');
            }
            if (!Schema::hasColumn('program_items', 'info_label')) {
                $table->string('info_label')->nullable()->after('metadata');
            }
            if (!Schema::hasColumn('program_items', 'info_value')) {
                $table->string('info_value')->nullable()->after('info_label');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('program_sections', function (Blueprint $table) {
            $table->dropColumn(['slug', 'section_id']);
        });

        Schema::table('program_items', function (Blueprint $table) {
            $table->dropColumn(['duration', 'features_title', 'info_label', 'info_value']);
        });
    }
};
