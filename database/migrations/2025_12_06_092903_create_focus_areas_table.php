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
            $table->foreignId('focus_area_section_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('icon')->default('file-text');
            $table->string('icon_color')->default('blue');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
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
