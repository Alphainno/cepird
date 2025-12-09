<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Founder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'linkedin_url' => 'nullable|string|max:255',
            'twitter_url' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $founder = Founder::first();

        if ($founder) {
            $founder->name = $validated['name'];
            $founder->title = $validated['title'];
            $founder->quote = $validated['quote'];
            $founder->linkedin_url = $validated['linkedin_url'] ?? null;
            $founder->twitter_url = $validated['twitter_url'] ?? null;
            $founder->email = $validated['email'] ?? null;
            $founder->is_active = $validated['is_active'];

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image
                if ($founder->image) {
                    Storage::disk('public')->delete($founder->image);
                }
                $founder->image = $request->file('image')->store('founder', 'public');
            }

            $founder->save();
        } else {
            // Handle image upload for new record
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('founder', 'public');
            }

            Founder::create($validated);
        }

        return redirect()->route('admin.founder.index')->with('success', 'Founder section updated successfully.');
    }
}
