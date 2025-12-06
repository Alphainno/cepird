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
        Schema::table('founders', function (Blueprint $table) {
            $table->string('name');
            $table->string('title');
            $table->text('quote');
            $table->string('image')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('email')->nullable();
            $table->boolean('is_active')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('founders', function (Blueprint $table) {
            $table->dropColumn(['name', 'title', 'quote', 'image', 'linkedin_url', 'twitter_url', 'email', 'is_active']);
        });
    }
};
