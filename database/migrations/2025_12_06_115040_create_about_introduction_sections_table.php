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
        Schema::create('about_introduction_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge_text');
            $table->string('title_line1');
            $table->string('title_line2');
            $table->text('paragraph1');
            $table->text('paragraph2');
            $table->text('paragraph3');
            $table->string('image_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_introduction_sections');
    }
};
