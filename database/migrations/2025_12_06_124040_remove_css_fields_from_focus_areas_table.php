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
            $table->dropColumn(['hover_border_class', 'bg_color_class', 'icon_bg_class']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('focus_areas', function (Blueprint $table) {
            $table->string('hover_border_class')->nullable()->after('is_active');
            $table->string('bg_color_class')->nullable()->after('hover_border_class');
            $table->string('icon_bg_class')->nullable()->after('bg_color_class');
        });
    }
};
