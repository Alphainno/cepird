<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\FocusAreaSection;
use App\Models\VisionSection;
use App\Models\Program;

class LandingPageController extends Controller
{
    public function index()
    {
        $heroSection = HeroSection::getActive();
        $aboutSection = AboutSection::with('pillars')->where('is_active', true)->first();
        $focusAreaSection = FocusAreaSection::with('focusAreas')->where('is_active', true)->first();
        $visionSection = VisionSection::with('missionPoints')->where('is_active', true)->first();
        $programs = Program::active()->ordered()->get()->groupBy('category');
        return view('pages.landing', compact('heroSection', 'aboutSection', 'focusAreaSection', 'visionSection', 'programs'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function focusAreas()
    {
        return view('pages.focusarea');
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
