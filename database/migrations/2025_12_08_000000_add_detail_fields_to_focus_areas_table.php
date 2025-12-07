<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('focus_areas', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('focus_area_section_id');
            $table->string('subheading')->nullable()->after('title');
            $table->text('detail_description')->nullable()->after('description');
            $table->string('image_path')->nullable()->after('detail_description');
            $table->string('cta_text')->nullable()->after('image_path');
            $table->string('cta_link')->nullable()->after('cta_text');
            $table->string('highlight1_icon')->nullable()->after('cta_link');
            $table->string('highlight1_title')->nullable()->after('highlight1_icon');
            $table->text('highlight1_description')->nullable()->after('highlight1_title');
            $table->string('highlight2_icon')->nullable()->after('highlight1_description');
            $table->string('highlight2_title')->nullable()->after('highlight2_icon');
            $table->text('highlight2_description')->nullable()->after('highlight2_title');
            $table->string('highlight3_icon')->nullable()->after('highlight2_description');
            $table->string('highlight3_title')->nullable()->after('highlight3_icon');
            $table->text('highlight3_description')->nullable()->after('highlight3_title');
        });
    }

    public function down(): void
    {
        Schema::table('focus_areas', function (Blueprint $table) {
            $table->dropColumn([
                'slug',
                'subheading',
                'detail_description',
                'image_path',
                'cta_text',
                'cta_link',
                'highlight1_icon', 'highlight1_title', 'highlight1_description',
                'highlight2_icon', 'highlight2_title', 'highlight2_description',
                'highlight3_icon', 'highlight3_title', 'highlight3_description',
            ]);
        });
    }
};
