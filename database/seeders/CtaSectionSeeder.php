<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CtaSection;

class CtaSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CtaSection::create([
            'title' => 'Join the Movement Toward a Future-Ready Bangladesh.',
            'description' => 'Whether you are a policy maker, student, or entrepreneur, there is a place for you at CEPIRD.',
            'button_text' => 'Contact CEPIRD',
            'button_url' => '/contact',
            'is_active' => true
        ]);
    }
}
