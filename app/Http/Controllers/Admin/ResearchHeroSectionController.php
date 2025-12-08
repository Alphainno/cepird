<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResearchHeroSection;
use Illuminate\Http\Request;

class ResearchHeroSectionController extends Controller
{
    /**
     * Display the research hero section management page
     */
    public function index()
    {
        $heroSection = ResearchHeroSection::getActive() ?? new ResearchHeroSection();
        return view('admin.research-hero.index', compact('heroSection'));
    }

    /**
     * Update or create the research hero section
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'badge_text' => 'required|string|max:255',
            'title_line1' => 'required|string|max:255',
            'title_line2' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $heroSection = ResearchHeroSection::first();

        if ($heroSection) {
            $heroSection->badge_text = $validated['badge_text'];
            $heroSection->title_line1 = $validated['title_line1'];
            $heroSection->title_line2 = $validated['title_line2'];
            $heroSection->subtitle = $validated['subtitle'];
            $heroSection->is_active = $validated['is_active'];

            // Handle background image upload
            if ($request->hasFile('background_image')) {
                $imageName = time() . '.' . $request->background_image->extension();
                $request->background_image->move(public_path('storage/research-hero'), $imageName);
                $heroSection->background_image = 'research-hero/' . $imageName;
            }

            $heroSection->save();
            $message = 'Research hero section updated successfully!';
        } else {
            // Handle background image upload for new record
            if ($request->hasFile('background_image')) {
                $imageName = time() . '.' . $request->background_image->extension();
                $request->background_image->move(public_path('storage/research-hero'), $imageName);
                $validated['background_image'] = 'research-hero/' . $imageName;
            }

            ResearchHeroSection::create($validated);
            $message = 'Research hero section created successfully!';
        }

        return redirect()->route('admin.research-hero.index')->with('success', $message);
    }
}
