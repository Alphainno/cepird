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
        Schema::table('programs', function (Blueprint $table) {
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('category', ['research', 'training', 'innovation', 'event']);
            $table->string('link')->nullable();
            $table->date('event_date')->nullable();
            $table->string('location')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'category', 'link', 'event_date', 'location', 'sort_order', 'is_active']);
        });
    }
};
