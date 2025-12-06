<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutHeroSection;
use Illuminate\Http\Request;

class AboutHeroController extends Controller
{
    public function index()
    {
        $aboutHero = AboutHeroSection::first();
        return view('admin.about.hero.index', compact('aboutHero'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'tag1' => 'required|string|max:255',
            'tag2' => 'required|string|max:255',
            'tag3' => 'required|string|max:255',
            'is_active' => 'boolean'
        ]);

        $aboutHero = AboutHeroSection::first();
        if (!$aboutHero) {
            $aboutHero = new AboutHeroSection();
        }

        $aboutHero->update($request->all());

        return redirect()->route('admin.about.hero.index')->with('success', 'About hero section updated successfully!');
    }
}
