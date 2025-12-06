<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeaderSetting;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeaderController extends Controller
{
    /**
     * Display the header management page.
     */
    public function index()
    {
        $headerSetting = HeaderSetting::first();

        if (!$headerSetting) {
            $headerSetting = new HeaderSetting([
                'brand_name' => 'CEPIRD',
                'tagline' => 'Innovate. Lead. Inspire.',
                'show_tagline' => true,
                'is_active' => true,
            ]);
        }

        $menuItems = MenuItem::orderBy('sort_order')->get();

        return view('admin.header.index', compact('headerSetting', 'menuItems'));
    }

    /**
     * Store or update the header settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'menu_items' => 'required|array|min:1',
            'menu_items.*.title' => 'required|string|max:255',
            'menu_items.*.url' => 'required|string|max:500',
        ]);

        // Get or create header settings
        $headerSetting = HeaderSetting::first();

        $headerData = [
            'brand_name' => $validated['brand_name'],
            'tagline' => $validated['tagline'] ?? null,
            'show_tagline' => $request->has('show_tagline'),
            'is_active' => $request->has('is_active'),
        ];

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($headerSetting && $headerSetting->logo) {
                Storage::disk('public')->delete($headerSetting->logo);
            }
            $headerData['logo'] = $request->file('logo')->store('header', 'public');
        }

        // Handle logo removal
        if ($request->has('remove_logo') && $headerSetting && $headerSetting->logo) {
            Storage::disk('public')->delete($headerSetting->logo);
            $headerData['logo'] = null;
        }

        if ($headerSetting) {
            $headerSetting->update($headerData);
        } else {
            $headerSetting = HeaderSetting::create($headerData);
        }

        // Handle menu items
        $existingIds = MenuItem::pluck('id')->toArray();
        $submittedIds = [];

        foreach ($request->menu_items as $index => $itemData) {
            $itemIsActive = isset($itemData['is_active']);
            $openInNewTab = isset($itemData['open_in_new_tab']);

            $itemToSave = [
                'title' => $itemData['title'],
                'url' => $itemData['url'],
                'open_in_new_tab' => $openInNewTab,
                'sort_order' => $index + 1,
                'is_active' => $itemIsActive,
            ];

            if (!empty($itemData['id'])) {
                $item = MenuItem::find($itemData['id']);
                if ($item) {
                    $item->update($itemToSave);
                    $submittedIds[] = $item->id;
                }
            } else {
                $newItem = MenuItem::create($itemToSave);
                $submittedIds[] = $newItem->id;
            }
        }

        // Delete removed items
        $idsToDelete = array_diff($existingIds, $submittedIds);
        MenuItem::whereIn('id', $idsToDelete)->delete();

        return redirect()->route('admin.header.index')
            ->with('success', 'Header settings updated successfully!');
    }
}
