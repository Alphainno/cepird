<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMapSection;
use Illuminate\Http\Request;

class ContactMapSectionController extends Controller
{
    public function index()
    {
        $mapSection = ContactMapSection::first();
        
        return view('admin.contact.map', compact('mapSection'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'section_badge' => 'required|string|max:255',
            'section_title' => 'required|string|max:255',
            'section_description' => 'nullable|string',
            'map_embed_url' => 'required|string',
            'is_active' => 'nullable|boolean',
        ]);

        $mapSection = ContactMapSection::first();
        
        if (!$mapSection) {
            $mapSection = new ContactMapSection();
        }

        $mapSection->fill($validated);
        $mapSection->is_active = $request->boolean('is_active');
        $mapSection->save();

        return redirect()->route('admin.contact-map.index')
            ->with('success', 'Map section updated successfully');
    }
}
