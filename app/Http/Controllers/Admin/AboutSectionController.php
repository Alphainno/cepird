<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    /**
     * Display the about section management page
     */
    public function index()
    {
        $aboutSection = AboutSection::getActive() ?? new AboutSection();
        return view('admin.about.index', compact('aboutSection'));
    }

    /**
     * Update or create the about section
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'main_title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'pillar1_title' => 'required|string|max:255',
            'pillar1_description' => 'required|string',
            'pillar1_icon' => 'nullable|string|max:255',
            'pillar2_title' => 'required|string|max:255',
            'pillar2_description' => 'required|string',
            'pillar2_icon' => 'nullable|string|max:255',
            'pillar3_title' => 'required|string|max:255',
            'pillar3_description' => 'required|string',
            'pillar3_icon' => 'nullable|string|max:255',
            'pillar4_title' => 'required|string|max:255',
            'pillar4_description' => 'required|string',
            'pillar4_icon' => 'nullable|string|max:255',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $aboutSection = AboutSection::first();

        if ($aboutSection) {
            $aboutSection->main_title = $validated['main_title'];
            $aboutSection->subtitle = $validated['subtitle'];
            $aboutSection->is_active = $validated['is_active'];
            $aboutSection->pillar1_title = $validated['pillar1_title'];
            $aboutSection->pillar1_description = $validated['pillar1_description'];
            $aboutSection->pillar1_icon = $validated['pillar1_icon'] ?? 'file-text';
            $aboutSection->pillar2_title = $validated['pillar2_title'];
            $aboutSection->pillar2_description = $validated['pillar2_description'];
            $aboutSection->pillar2_icon = $validated['pillar2_icon'] ?? 'lightbulb';
            $aboutSection->pillar3_title = $validated['pillar3_title'];
            $aboutSection->pillar3_description = $validated['pillar3_description'];
            $aboutSection->pillar3_icon = $validated['pillar3_icon'] ?? 'trending-up';
            $aboutSection->pillar4_title = $validated['pillar4_title'];
            $aboutSection->pillar4_description = $validated['pillar4_description'];
            $aboutSection->pillar4_icon = $validated['pillar4_icon'] ?? 'users';
            $aboutSection->save();
            $message = 'About section updated successfully!';
        } else {
            AboutSection::create($validated);
            $message = 'About section created successfully!';
        }

        return redirect()->route('admin.about.index')->with('success', $message);
    }
}
