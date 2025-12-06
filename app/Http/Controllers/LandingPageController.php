<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSection;
use App\Models\AboutSection;

class LandingPageController extends Controller
{
    public function index()
    {
        $heroSection = HeroSection::getActive();
        $aboutSection = AboutSection::getActive();
        return view('pages.landing', compact('heroSection', 'aboutSection'));
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
