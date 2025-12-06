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
        Schema::create('program_initiative_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge_text')->default('Our Initiatives');
            $table->string('title')->default('Programs & Initiatives');
            $table->string('subtitle')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_initiative_sections');
    }
};
