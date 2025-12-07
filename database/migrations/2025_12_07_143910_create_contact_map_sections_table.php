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
        Schema::create('contact_map_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_badge')->default('Our Location');
            $table->string('section_title')->default('Find Us Here');
            $table->text('section_description')->nullable();
            $table->text('map_embed_url');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_map_sections');
    }
};
