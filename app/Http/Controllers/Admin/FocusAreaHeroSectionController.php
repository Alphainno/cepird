<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FocusAreaHeroSection;
use Illuminate\Support\Facades\Storage;

class FocusAreaHeroSectionController extends Controller
{
    public function index()
    {
        $heroSection = FocusAreaHeroSection::first();
        return view('admin.focus-area-hero.index', compact('heroSection'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $heroSection = FocusAreaHeroSection::first();

        if (!$heroSection) {
            $heroSection = new FocusAreaHeroSection();
        }

        $heroSection->title = $request->title;
        $heroSection->subtitle = $request->subtitle;
        $heroSection->description = $request->description;

        if ($request->hasFile('background_image')) {
            // Delete old image if exists
            if ($heroSection->background_image && Storage::disk('public')->exists($heroSection->background_image)) {
                Storage::disk('public')->delete($heroSection->background_image);
            }

            $imagePath = $request->file('background_image')->store('focus-area-hero', 'public');
            $heroSection->background_image = $imagePath;
        }

        $heroSection->save();

        return redirect()->back()->with('success', 'Focus Area Hero Section updated successfully.');
    }
}
