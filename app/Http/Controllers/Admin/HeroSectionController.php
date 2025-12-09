<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    /**
     * Display the hero section management page
     */
    public function index()
    {
        $heroSection = HeroSection::getActive() ?? new HeroSection();
        return view('admin.hero.index', compact('heroSection'));
    }

    /**
     * Update or create the hero section
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'badge_text' => 'nullable|string|max:255',
            'title_line1' => 'required|string|max:255',
            'title_line2' => 'required|string|max:255',
            'title_line3' => 'required|string|max:255',
            'description' => 'required|string',
            'button1_text' => 'required|string|max:255',
            'button1_link' => 'nullable|string|max:255',
            // 'button2_text' => 'nullable|string|max:255',
            // 'button2_link' => 'nullable|string|max:255',
            'founder_name' => 'nullable|string|max:255',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $heroSection = HeroSection::first();

        if ($heroSection) {
            $heroSection->badge_text = $validated['badge_text'];
            $heroSection->title_line1 = $validated['title_line1'];
            $heroSection->title_line2 = $validated['title_line2'];
            $heroSection->title_line3 = $validated['title_line3'];
            $heroSection->description = $validated['description'];
            $heroSection->button1_text = $validated['button1_text'];
            $heroSection->button1_link = $validated['button1_link'];
            // $heroSection->button2_text = $validated['button2_text'];
            // $heroSection->button2_link = $validated['button2_link'];
            $heroSection->founder_name = $validated['founder_name'];
            $heroSection->is_active = $validated['is_active'];
            $heroSection->save();
            $message = 'Hero section updated successfully!';
        } else {
            HeroSection::create($validated);
            $message = 'Hero section created successfully!';
        }

        return redirect()->route('admin.hero.index')->with('success', $message);
    }
}
