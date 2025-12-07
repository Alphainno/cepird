<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FocusAreaOutcomeSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\FocusAreaOutcomeSection::create([
            'badge_text' => 'Key Outcomes',
            'title' => 'What We Deliver',
            'description' => 'Our focus areas translate into concrete deliverables that drive real impact across Bangladesh\'s entrepreneurial ecosystem.',
            'is_active' => true,
        ]);
    }
}
