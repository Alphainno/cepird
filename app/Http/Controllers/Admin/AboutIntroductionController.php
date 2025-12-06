<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutIntroductionSection;
use Illuminate\Http\Request;

class AboutIntroductionController extends Controller
{
    public function index()
    {
        $aboutIntroduction = AboutIntroductionSection::first();
        return view('admin.about.introduction.index', compact('aboutIntroduction'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text' => 'required|string|max:255',
            'title_line1' => 'required|string|max:255',
            'title_line2' => 'required|string|max:255',
            'paragraph1' => 'required|string',
            'paragraph2' => 'required|string',
            'paragraph3' => 'required|string',
            'image_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean'
        ]);

        $aboutIntroduction = AboutIntroductionSection::first();
        if (!$aboutIntroduction) {
            $aboutIntroduction = new AboutIntroductionSection();
        }

        $data = $request->except('image');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($aboutIntroduction->image && file_exists(public_path('storage/' . $aboutIntroduction->image))) {
                unlink(public_path('storage/' . $aboutIntroduction->image));
            }

            // Store new image
            $imagePath = $request->file('image')->store('about-introduction', 'public');
            $data['image'] = $imagePath;
        }

        $aboutIntroduction->update($data);

        return redirect()->route('admin.about.introduction.index')->with('success', 'About introduction section updated successfully!');
    }
}
