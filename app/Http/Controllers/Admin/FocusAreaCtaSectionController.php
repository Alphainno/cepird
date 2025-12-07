<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FocusAreaCtaSection;
use Illuminate\Http\Request;

class FocusAreaCtaSectionController extends Controller
{
    public function index()
    {
        // Ensure a record always exists so defaults (seeded or created) are shown in the form
        $section = FocusAreaCtaSection::firstOrCreate([], [
            'title' => 'Join Our Focus Areas',
            'description' => 'Whether you\'re a policymaker, researcher, entrepreneur, or innovator, there\'s a way for you to contribute to shaping Bangladesh\'s entrepreneurial future.',
            'is_active' => true,
        ]);

        // If a blank row was created earlier, backfill it with defaults so preview is visible
        if (!$section->title || !$section->description) {
            $section->update([
                'title' => $section->title ?: 'Join Our Focus Areas',
                'description' => $section->description ?: 'Whether you\'re a policymaker, researcher, entrepreneur, or innovator, there\'s a way for you to contribute to shaping Bangladesh\'s entrepreneurial future.',
                'is_active' => $section->is_active ?? true,
            ]);
        }
        return view('admin.focus-areas.cta-section', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'nullable|boolean',
        ]);

        $section = FocusAreaCtaSection::first();
        if (!$section) {
            $section = new FocusAreaCtaSection();
        }

        $section->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->back()->with('success', 'Section updated successfully.');
    }
}
