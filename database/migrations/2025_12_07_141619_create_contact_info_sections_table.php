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
        Schema::create('contact_info_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_badge')->default('Reach Out');
            $table->string('section_title')->default('Contact Information');
            $table->text('section_description')->nullable();
            $table->string('office_title')->default('Head Office');
            $table->text('office_address')->nullable();
            $table->string('email_title')->default('Email');
            $table->string('email')->nullable();
            $table->string('email_subtitle')->nullable();
            $table->string('phone_title')->default('Phone');
            $table->string('phone')->nullable();
            $table->string('phone_subtitle')->nullable();
            $table->string('website_title')->default('Website');
            $table->string('website')->nullable();
            $table->string('website_subtitle')->nullable();
            $table->string('form_title')->default('Send Us a Message');
            $table->text('form_description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_info_sections');
    }
};
