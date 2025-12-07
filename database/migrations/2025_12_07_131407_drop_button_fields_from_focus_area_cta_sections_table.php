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
        Schema::table('focus_area_cta_sections', function (Blueprint $table) {
            $table->dropColumn(['primary_button_text', 'primary_button_link', 'secondary_button_text', 'secondary_button_link']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('focus_area_cta_sections', function (Blueprint $table) {
            $table->string('primary_button_text')->nullable();
            $table->string('primary_button_link')->nullable();
            $table->string('secondary_button_text')->nullable();
            $table->string('secondary_button_link')->nullable();
        });
    }
};
