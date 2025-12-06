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
        Schema::table('pillars', function (Blueprint $table) {
            $table->foreignId('about_section_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('icon')->default('file-text');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('pillars', function (Blueprint $table) {
            $table->dropForeign(['about_section_id']);
            $table->dropColumn(['about_section_id', 'title', 'description', 'icon', 'sort_order', 'is_active']);
        });
    }
};
