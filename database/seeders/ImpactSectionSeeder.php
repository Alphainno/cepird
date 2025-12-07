<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImpactSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ImpactSection::create([
            'badge_text' => 'Our Impact',
            'title' => 'Driving Change Across Bangladesh',
            'is_active' => true,
        ]);
    }
}
