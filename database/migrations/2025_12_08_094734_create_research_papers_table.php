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
        Schema::create('research_papers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('research_categories')->onDelete('cascade');
            $table->string('title');
            $table->text('authors');
            $table->text('description');
            $table->date('publication_date');
            $table->integer('pages')->nullable();
            $table->integer('citations')->default(0);
            $table->json('tags')->nullable(); // store tags as JSON array
            $table->string('pdf_file')->nullable();
            $table->string('icon_color')->default('blue-900'); // for gradient colors
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_papers');
    }
};
