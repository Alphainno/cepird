<?php

namespace Database\Seeders;

use App\Models\ProgramSection;
use App\Models\ProgramItem;
use Illuminate\Database\Seeder;

class ProgramSectionSeeder extends Seeder
{
    public function run(): void
    {
        // Section 1: Research & Publications
        $research = ProgramSection::create([
            'title' => 'Research & Publications',
            'slug' => 'research-publications',
            'badge_text' => 'Academic Excellence',
            'description' => 'Our research programs focus on generating evidence-based knowledge to inform policy and practice in education, entrepreneurship, and regional development.',
            'color_theme' => 'blue',
            'order' => 1,
            'is_active' => true,
        ]);

        // Research Items
        ProgramItem::create([
            'program_section_id' => $research->id,
            'title' => 'Research Fellowship Program',
            'icon' => 'academic-cap',
            'duration' => '6 months',
            'description' => 'Support for researchers investigating education policy, entrepreneurship ecosystems, and regional development challenges.',
            'features' => [
                'Funded research opportunities',
                'Mentorship from senior researchers',
                'Publication support'
            ],
            'info_label' => 'Next Cohort',
            'info_value' => 'Jan 2025',
            'order' => 1,
            'is_active' => true,
        ]);

        ProgramItem::create([
            'program_section_id' => $research->id,
            'title' => 'Academic Publication Support',
            'icon' => 'document-text',
            'duration' => 'Ongoing',
            'description' => 'Assistance with peer-reviewed journal submissions, conference papers, and policy briefs on regional development topics.',
            'features' => [
                'Editorial support services',
                'Peer review facilitation',
                'Open access publishing options'
            ],
            'info_label' => 'Papers Published',
            'info_value' => '120+',
            'order' => 2,
            'is_active' => true,
        ]);

        ProgramItem::create([
            'program_section_id' => $research->id,
            'title' => 'Research Grants Program',
            'icon' => 'currency-rupee',
            'duration' => '12 months',
            'description' => 'Competitive grants for original research addressing key challenges in education, entrepreneurship, and regional development.',
            'features' => [
                'Grants up to ₹5 lakhs',
                'Research methodology training',
                'Dissemination support'
            ],
            'info_label' => 'Applications',
            'info_value' => 'Open',
            'order' => 3,
            'is_active' => true,
        ]);

        ProgramItem::create([
            'program_section_id' => $research->id,
            'title' => 'Policy Research Initiative',
            'icon' => 'document-report',
            'duration' => '9 months',
            'description' => 'Applied research projects focused on informing policy decisions at local, state, and national levels.',
            'features' => [
                'Government partnerships',
                'Policy brief development',
                'Stakeholder engagement'
            ],
            'info_label' => 'Partners',
            'info_value' => '25+',
            'order' => 4,
            'is_active' => true,
        ]);

        // Section 2: Training & Certification
        $training = ProgramSection::create([
            'title' => 'Training & Certification',
            'slug' => 'training-certification',
            'badge_text' => 'Skill Development',
            'description' => 'Our training programs equip individuals with the skills and knowledge needed to succeed in today\'s dynamic landscape.',
            'color_theme' => 'teal',
            'order' => 2,
            'is_active' => true,
        ]);

        ProgramItem::create([
            'program_section_id' => $training->id,
            'title' => 'Entrepreneurship Development Program',
            'icon' => 'light-bulb',
            'duration' => '3 months',
            'description' => 'Comprehensive training for aspiring entrepreneurs covering business planning, financial management, and market strategies.',
            'features' => [
                'Business plan development',
                'Mentorship from successful entrepreneurs',
                'Pitch competition'
            ],
            'info_label' => 'Next Batch',
            'info_value' => 'Mar 2025',
            'order' => 1,
            'is_active' => true,
        ]);

        ProgramItem::create([
            'program_section_id' => $training->id,
            'title' => 'Teacher Professional Development',
            'icon' => 'users',
            'duration' => '4 weeks',
            'description' => 'Specialized training for educators to enhance teaching methodologies and integrate 21st-century skills into curriculum.',
            'features' => [
                'Pedagogy workshops',
                'Technology integration training',
                'Certification recognized by education boards'
            ],
            'info_label' => 'Teachers Trained',
            'info_value' => '2500+',
            'order' => 2,
            'is_active' => true,
        ]);

        ProgramItem::create([
            'program_section_id' => $training->id,
            'title' => 'Digital Skills Certification',
            'icon' => 'desktop-computer',
            'duration' => '2 months',
            'description' => 'Industry-recognized certification program in digital literacy, data analysis, and digital marketing.',
            'features' => [
                'Hands-on project work',
                'Industry-recognized certification',
                'Job placement assistance'
            ],
            'info_label' => 'Certified',
            'info_value' => '1800+',
            'order' => 3,
            'is_active' => true,
        ]);

        ProgramItem::create([
            'program_section_id' => $training->id,
            'title' => 'Leadership Development Program',
            'icon' => 'presentation-chart-bar',
            'duration' => '6 weeks',
            'description' => 'Training for emerging leaders in educational institutions, NGOs, and community organizations.',
            'features' => [
                'Strategic thinking workshops',
                'Team management skills',
                'Networking opportunities'
            ],
            'info_label' => 'Format',
            'info_value' => 'Hybrid',
            'order' => 4,
            'is_active' => true,
        ]);

        // Section 3: Innovation Programs
        $innovation = ProgramSection::create([
            'title' => 'Innovation Programs',
            'slug' => 'innovation-programs',
            'badge_text' => 'Creative Solutions',
            'description' => 'Our innovation programs foster creative thinking and develop solutions to regional development challenges.',
            'color_theme' => 'amber',
            'order' => 3,
            'is_active' => true,
        ]);

        ProgramItem::create([
            'program_section_id' => $innovation->id,
            'title' => 'Social Innovation Lab',
            'icon' => 'beaker',
            'duration' => '4 months',
            'description' => 'Incubation support for social enterprises addressing education, employment, and community development challenges.',
            'features' => [
                'Workspace and resources',
                'Seed funding opportunities',
                'Expert mentorship'
            ],
            'info_label' => 'Ventures',
            'info_value' => '45+',
            'order' => 1,
            'is_active' => true,
        ]);

        ProgramItem::create([
            'program_section_id' => $innovation->id,
            'title' => 'EdTech Innovation Challenge',
            'icon' => 'chip',
            'duration' => '3 months',
            'description' => 'Competition for innovative technology solutions to improve educational outcomes in underserved communities.',
            'features' => [
                'Cash prizes up to ₹10 lakhs',
                'Pilot implementation support',
                'Investor connections'
            ],
            'info_label' => 'Submissions',
            'info_value' => '200+',
            'order' => 2,
            'is_active' => true,
        ]);

        ProgramItem::create([
            'program_section_id' => $innovation->id,
            'title' => 'Rural Innovation Program',
            'icon' => 'globe',
            'duration' => '6 months',
            'description' => 'Support for grassroots innovations addressing rural development challenges in agriculture, healthcare, and education.',
            'features' => [
                'Field testing support',
                'Community engagement',
                'Scale-up assistance'
            ],
            'info_label' => 'Villages',
            'info_value' => '150+',
            'order' => 3,
            'is_active' => true,
        ]);

        ProgramItem::create([
            'program_section_id' => $innovation->id,
            'title' => 'Hackathon Series',
            'icon' => 'code',
            'duration' => '48 hours',
            'description' => 'Regular hackathons bringing together developers, designers, and domain experts to solve regional challenges.',
            'features' => [
                'Diverse problem statements',
                'Expert judges',
                'Implementation support for winners'
            ],
            'info_label' => 'Participants',
            'info_value' => '3000+',
            'order' => 4,
            'is_active' => true,
        ]);

        // Section 4: Conferences & Events
        $conferences = ProgramSection::create([
            'title' => 'Conferences & Events',
            'slug' => 'conferences-events',
            'badge_text' => 'Knowledge Exchange',
            'description' => 'Our conferences and events bring together thought leaders, practitioners, and stakeholders to share knowledge and build networks.',
            'color_theme' => 'indigo',
            'order' => 4,
            'is_active' => true,
        ]);

        ProgramItem::create([
            'program_section_id' => $conferences->id,
            'title' => 'Annual Education Summit',
            'icon' => 'users',
            'duration' => '3 days',
            'description' => 'Flagship conference bringing together educators, policymakers, and researchers to discuss innovations in education.',
            'features' => [
                '50+ expert speakers',
                'Interactive workshops',
                'Networking sessions'
            ],
            'info_label' => 'Date',
            'info_value' => 'Sep 2025',
            'order' => 1,
            'is_active' => true,
        ]);

        ProgramItem::create([
            'program_section_id' => $conferences->id,
            'title' => 'Regional Development Conference',
            'icon' => 'presentation-chart-bar',
            'duration' => '2 days',
            'description' => 'Multi-stakeholder dialogue on strategies and policies for inclusive regional development.',
            'features' => [
                'Policy dialogues',
                'Case study presentations',
                'Action plan development'
            ],
            'info_label' => 'Attendees',
            'info_value' => '500+',
            'order' => 2,
            'is_active' => true,
        ]);

        ProgramItem::create([
            'program_section_id' => $conferences->id,
            'title' => 'Entrepreneurship Bootcamp',
            'icon' => 'lightning-bolt',
            'duration' => '5 days',
            'description' => 'Intensive program for aspiring entrepreneurs with workshops, mentoring, and pitch opportunities.',
            'features' => [
                'Expert-led sessions',
                'One-on-one mentoring',
                'Demo day with investors'
            ],
            'info_label' => 'Next Event',
            'info_value' => 'Apr 2025',
            'order' => 3,
            'is_active' => true,
        ]);

        ProgramItem::create([
            'program_section_id' => $conferences->id,
            'title' => 'Monthly Webinar Series',
            'icon' => 'video-camera',
            'duration' => '2 hours',
            'description' => 'Regular online sessions featuring experts discussing topics in education, entrepreneurship, and development.',
            'features' => [
                'Free registration',
                'Q&A sessions',
                'Recording access'
            ],
            'info_label' => 'Webinars',
            'info_value' => '50+',
            'order' => 4,
            'is_active' => true,
        ]);
    }
}
