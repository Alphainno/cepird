<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutIntroductionSection;

class AboutIntroductionSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutIntroductionSection::create([
            'badge_text' => 'Who We Are',
            'title_line1' => 'Where Research Meets',
            'title_line2' => 'Real-World Impact',
            'paragraph1' => 'CEPIRD is a forward-thinking national initiative dedicated to shaping the future of entrepreneurship, policy innovation, and socio-economic transformation in Bangladesh.',
            'paragraph2' => 'Founded by Mohammad Shahriar Khan, a visionary entrepreneur and ecosystem builder, we connect policymakers, entrepreneurs, educators, and innovators to design sustainable strategies for emerging economies.',
            'paragraph3' => 'We operate where ideas transform into action and research shapes national progress.',
            'image_url' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&auto=format&fit=crop&q=80',
            'is_active' => true,
        ]);
    }
}
