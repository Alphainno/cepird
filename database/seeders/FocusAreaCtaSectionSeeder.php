<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FocusAreaCtaSection;

class FocusAreaCtaSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FocusAreaCtaSection::create([
            'title' => 'Join Our Focus Areas',
            'description' => 'Whether you\'re a policymaker, researcher, entrepreneur, or innovator, there\'s a way for you to contribute to shaping Bangladesh\'s entrepreneurial future.',
            'is_active' => true,
        ]);
    }
}
