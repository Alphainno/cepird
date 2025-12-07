<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Founder;

class FounderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Founder::create([
            'name' => 'Mohammad Shahriar Khan',
            'title' => 'Entrepreneur • Ecosystem Builder • Policy Advocate',
            'quote' => 'Innovation should not be a privilege; it should be accessible to every dreamer who wants to build a better Bangladesh.',
            'image' => null, // No image available, will show placeholder
            'linkedin_url' => '#',
            'twitter_url' => '#',
            'email' => 'shahriar@cepird.org',
            'is_active' => true,
        ]);
    }
}
