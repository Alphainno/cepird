<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactHeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactHeroSectionController extends Controller
{
    public function index()
    {
        $heroSection = ContactHeroSection::first();
        return view('admin.contact.hero', compact('heroSection'));
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

        $heroSection = ContactHeroSection::first() ?? new ContactHeroSection();

        $heroSection->badge_text = $validated['badge_text'] ?? null;
        $heroSection->title = $validated['title'];
        $heroSection->description = $validated['description'] ?? null;
        $heroSection->is_active = $request->boolean('is_active', false);

        if ($request->hasFile('background_image')) {
            if ($heroSection->background_image && Storage::disk('public')->exists($heroSection->background_image)) {
                Storage::disk('public')->delete($heroSection->background_image);
            }

            $heroSection->background_image = $request->file('background_image')->store('contact-hero', 'public');
        }

        $heroSection->save();

        return redirect()->route('admin.contact-hero.index')->with('success', 'Contact hero section updated successfully.');
    }
}
