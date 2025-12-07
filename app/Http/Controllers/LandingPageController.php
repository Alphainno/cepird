<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\FocusAreaSection;
use App\Models\FocusArea;
use App\Models\FocusAreaHeroSection;
use App\Models\VisionSection;
use App\Models\Program;
use App\Models\Founder;
use App\Models\CtaSection;
use App\Models\AboutHeroSection;
use App\Models\AboutIntroductionSection;
use App\Models\VisionMissionSection;
use App\Models\CoreValueSection;
use App\Models\WhatWeDoSection;
use App\Models\ProgramInitiativeSection;
use App\Models\StrategicPillar;

class LandingPageController extends Controller
{
    public function index()
    {
        $heroSection = HeroSection::getActive();
        $aboutSection = AboutSection::with('pillars')->where('is_active', true)->first();
        $focusAreaSection = FocusAreaSection::with('focusAreas')->where('is_active', true)->first();
        $visionSection = VisionSection::with('missionPoints')->where('is_active', true)->first();
        $programs = Program::active()->ordered()->get()->groupBy('category');
        $founder = Founder::getActive();
        $ctaSection = CtaSection::getActive();
        return view('pages.landing', compact('heroSection', 'aboutSection', 'focusAreaSection', 'visionSection', 'programs', 'founder', 'ctaSection'));
    }

    public function about()
    {
        $aboutHero = AboutHeroSection::getActive();
        $aboutIntroduction = AboutIntroductionSection::getActive();
        $focusAreaSection = FocusAreaSection::where('is_active', true)->first();
        $focusAreas = FocusArea::active()->ordered()->get();
        $visionMission = VisionMissionSection::getActive();
        $coreValueSection = CoreValueSection::with('coreValues')->where('is_active', true)->first();
        $whatWeDoSection = WhatWeDoSection::with('items')->where('is_active', true)->first();
        $programSection = ProgramInitiativeSection::with(['programs.items'])->where('is_active', true)->first();
        return view('pages.about', compact('aboutHero', 'aboutIntroduction', 'focusAreaSection', 'focusAreas', 'visionMission', 'coreValueSection', 'whatWeDoSection', 'programSection'));
    }

    public function focusAreas()
    {
        $heroSection = FocusAreaHeroSection::getActive();
        $strategicPillars = StrategicPillar::active()->ordered()->get();
        return view('pages.focusarea', compact('heroSection', 'strategicPillars'));
    }

    public function programs()
    {
        return view('pages.program');
    }

    public function founder()
    {
        return view('pages.founder');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
