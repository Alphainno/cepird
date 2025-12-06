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
        Schema::table('focus_areas', function (Blueprint $table) {
            $table->foreignId('focus_area_section_id')->nullable()->constrained()->onDelete('cascade')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('focus_areas', function (Blueprint $table) {
            $table->dropForeign(['focus_area_section_id']);
            $table->dropColumn('focus_area_section_id');
        });
    }
};
