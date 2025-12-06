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
        Schema::create('focus_areas', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable(); // Emoji or icon class
            $table->string('title');
            $table->text('description');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('hover_border_class')->nullable(); // e.g., 'hover:border-blue-200'
            $table->string('bg_color_class')->nullable(); // e.g., 'bg-blue-50'
            $table->string('icon_bg_class')->nullable(); // e.g., 'group-hover:bg-blue-100'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('focus_areas');
    }
};
