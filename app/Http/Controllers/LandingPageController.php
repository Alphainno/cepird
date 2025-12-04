<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('pages.landing');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function focusAreas()
    {
        return view('pages.focusarea');
    }
}
