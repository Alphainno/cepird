<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfoSection;
use Illuminate\Http\Request;

class ContactInfoSectionController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInfoSection::first();
        return view('admin.contact.info', compact('contactInfo'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'section_badge' => 'required|string|max:255',
            'section_title' => 'required|string|max:255',
            'section_description' => 'nullable|string',
            'office_title' => 'required|string|max:255',
            'office_address' => 'nullable|string',
            'email_title' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'email_subtitle' => 'nullable|string|max:255',
            'phone_title' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'phone_subtitle' => 'nullable|string|max:255',
            'website_title' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'website_subtitle' => 'nullable|string|max:255',
            'form_title' => 'required|string|max:255',
            'form_description' => 'nullable|string',
        ]);

        $contactInfo = ContactInfoSection::first() ?? new ContactInfoSection();
        $contactInfo->fill($validated);
        $contactInfo->is_active = $request->boolean('is_active', false);
        $contactInfo->save();

        return redirect()->route('admin.contact-info.index')->with('success', 'Contact information updated successfully.');
    }
}
