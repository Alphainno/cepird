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
        Schema::table('cta_sections', function (Blueprint $table) {
            // Drop primary button columns
            $table->dropColumn(['primary_button_text', 'primary_button_url']);

            // Rename secondary button columns
            $table->renameColumn('secondary_button_text', 'button_text');
            $table->renameColumn('secondary_button_url', 'button_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cta_sections', function (Blueprint $table) {
            // Rename back to secondary
            $table->renameColumn('button_text', 'secondary_button_text');
            $table->renameColumn('button_url', 'secondary_button_url');

            // Re-add primary button columns
            $table->string('primary_button_text')->after('description');
            $table->string('primary_button_url')->after('primary_button_text');
        });
    }
};
