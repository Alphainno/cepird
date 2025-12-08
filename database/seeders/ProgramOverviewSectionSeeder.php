<?php

namespace Database\Seeders;

use App\Models\ProgramOverviewSection;
use Illuminate\Database\Seeder;

class ProgramOverviewSectionSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        ProgramOverviewSection::create([
            'badge_text' => 'Our Impact Initiatives',
            'title' => 'Four Core Program Areas',
            'description' => 'From cutting-edge research to hands-on entrepreneurship support, our programs are designed to create measurable impact across Bangladesh\'s innovation ecosystem.',
            'is_active' => true,
        ]);
    }
}
