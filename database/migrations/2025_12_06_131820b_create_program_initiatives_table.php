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
        Schema::create('program_initiatives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_initiative_section_id')->constrained()->onDelete('cascade');
            $table->string('icon')->default('📘');
            $table->string('title');
            $table->string('color')->default('blue');
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
        Schema::dropIfExists('program_initiatives');
    }
};
