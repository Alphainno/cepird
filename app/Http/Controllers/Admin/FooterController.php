<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use App\Models\FooterLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FooterController extends Controller
{
    public function index()
    {
        $footerSetting = FooterSetting::getActive();
        $quickLinks = FooterLink::where('section', 'quick_links')->orderBy('sort_order')->get();
        $legalLinks = FooterLink::where('section', 'legal')->orderBy('sort_order')->get();

        return view('admin.footer.index', compact('footerSetting', 'quickLinks', 'legalLinks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'facebook_url' => 'nullable|url|max:500',
            'twitter_url' => 'nullable|url|max:500',
            'linkedin_url' => 'nullable|url|max:500',
            'instagram_url' => 'nullable|url|max:500',
            'youtube_url' => 'nullable|url|max:500',
            'copyright_text' => 'nullable|string|max:255',
            'newsletter_title' => 'nullable|string|max:255',
            'quick_links' => 'nullable|array',
            'quick_links.*.title' => 'required|string|max:255',
            'quick_links.*.url' => 'required|string|max:500',
            'legal_links' => 'nullable|array',
            'legal_links.*.title' => 'required|string|max:255',
            'legal_links.*.url' => 'required|string|max:500',
        ]);

        $footerSetting = FooterSetting::first();

        $footerData = [
            'brand_name' => $validated['brand_name'],
            'description' => $validated['description'] ?? null,
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'address' => $validated['address'] ?? null,
            'facebook_url' => $validated['facebook_url'] ?? null,
            'twitter_url' => $validated['twitter_url'] ?? null,
            'linkedin_url' => $validated['linkedin_url'] ?? null,
            'instagram_url' => $validated['instagram_url'] ?? null,
            'youtube_url' => $validated['youtube_url'] ?? null,
            'copyright_text' => $validated['copyright_text'] ?? null,
            'show_newsletter' => $request->has('show_newsletter'),
            'newsletter_title' => $validated['newsletter_title'] ?? 'Newsletter',
            'is_active' => $request->has('is_active'),
        ];

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($footerSetting && $footerSetting->logo) {
                Storage::disk('public')->delete($footerSetting->logo);
            }
            $footerData['logo'] = $request->file('logo')->store('footer', 'public');
        }

        // Handle logo removal
        if ($request->has('remove_logo') && $footerSetting && $footerSetting->logo) {
            Storage::disk('public')->delete($footerSetting->logo);
            $footerData['logo'] = null;
        }

        if ($footerSetting) {
            $footerSetting->update($footerData);
        } else {
            $footerSetting = FooterSetting::create($footerData);
        }

        // Handle quick links
        $this->syncLinks('quick_links', $request->quick_links ?? []);

        // Handle legal links
        $this->syncLinks('legal', $request->legal_links ?? []);

        return redirect()->route('admin.footer.index')->with('success', 'Footer settings updated successfully!');
    }

    private function syncLinks($section, $linksData)
    {
        $existingIds = FooterLink::where('section', $section)->pluck('id')->toArray();
        $submittedIds = [];

        foreach ($linksData as $index => $linkData) {
            $linkIsActive = isset($linkData['is_active']);
            $openInNewTab = isset($linkData['open_in_new_tab']);

            $linkToSave = [
                'title' => $linkData['title'],
                'url' => $linkData['url'],
                'section' => $section,
                'open_in_new_tab' => $openInNewTab,
                'sort_order' => $index + 1,
                'is_active' => $linkIsActive,
            ];

            if (!empty($linkData['id'])) {
                $link = FooterLink::find($linkData['id']);
                if ($link) {
                    $link->update($linkToSave);
                    $submittedIds[] = $link->id;
                }
            } else {
                $newLink = FooterLink::create($linkToSave);
                $submittedIds[] = $newLink->id;
            }
        }

        // Delete removed links
        $idsToDelete = array_diff($existingIds, $submittedIds);
        FooterLink::whereIn('id', $idsToDelete)->delete();
    }
}
