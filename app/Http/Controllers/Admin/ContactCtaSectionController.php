<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactCtaSection;
use Illuminate\Http\Request;

class ContactCtaSectionController extends Controller
{
    public function index()
    {
        $ctaSection = ContactCtaSection::first();

        return view('admin.contact.cta', compact('ctaSection'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_1_text' => 'required|string|max:255',
            'button_1_url' => 'required|string|max:255',
            'button_2_text' => 'required|string|max:255',
            'button_2_url' => 'required|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        $ctaSection = ContactCtaSection::first();

        if (!$ctaSection) {
            $ctaSection = new ContactCtaSection();
        }

        $ctaSection->fill($validated);
        $ctaSection->is_active = $request->boolean('is_active');
        $ctaSection->save();

        return redirect()->route('admin.contact-cta.index')
            ->with('success', 'CTA section updated successfully');
    }
}
