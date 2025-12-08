<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramHeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramHeroSectionController extends Controller
{
    public function index()
    {
        $heroSection = ProgramHeroSection::first();
        return view('admin.programs.hero', compact('heroSection'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'badge_text' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'is_active' => 'nullable|boolean',
        ]);

        $heroSection = ProgramHeroSection::first() ?? new ProgramHeroSection();

        $heroSection->badge_text = $validated['badge_text'] ?? null;
        $heroSection->title = $validated['title'];
        $heroSection->description = $validated['description'] ?? null;
        $heroSection->is_active = $request->boolean('is_active', false);

        if ($request->hasFile('background_image')) {
            if ($heroSection->background_image && file_exists(public_path('images/' . $heroSection->background_image))) {
                unlink(public_path('images/' . $heroSection->background_image));
            }

            $file = $request->file('background_image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/program-hero'), $filename);
            $heroSection->background_image = 'program-hero/' . $filename;
        }

        $heroSection->save();

        return redirect()->route('admin.programs-hero.index')->with('success', 'Program hero section updated successfully.');
    }
}
