<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Founder;
use Illuminate\Http\Request;

class FounderController extends Controller
{
    /**
     * Display the founder section management page
     */
    public function index()
    {
        $founder = Founder::getActive() ?? new Founder();
        return view('admin.founder.index', compact('founder'));
    }

    /**
     * Update or create the founder section
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'quote' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'linkedin_url' => 'nullable|string|max:255',
            'twitter_url' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'is_active' => 'nullable|boolean',
        ]);

        $founder = Founder::getActive();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = '/images/' . $imageName;

            // Delete old image if exists
            if ($founder && $founder->image && file_exists(public_path($founder->image))) {
                unlink(public_path($founder->image));
            }
        } else {
            // Keep existing image
            unset($validated['image']);
        }

        if ($founder) {
            $founder->update($validated);
        } else {
            Founder::create($validated);
        }

        return redirect()->back()->with('success', 'Founder section updated successfully.');
    }
}
