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
        Schema::create('contact_cta_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default("Let's Build the Future Together");
            $table->text('description')->nullable();
            $table->string('button_1_text')->default('Learn About Us');
            $table->string('button_1_url')->default('/about');
            $table->string('button_2_text')->default('Explore Programs');
            $table->string('button_2_url')->default('/programs');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_cta_sections');
    }
};
