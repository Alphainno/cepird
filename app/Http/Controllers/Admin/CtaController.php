<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CtaSection;
use Illuminate\Http\Request;

class CtaController extends Controller
{
    public function index()
    {
        $cta = CtaSection::first();
        return view('admin.cta.index', compact('cta'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:255',
            'button_url' => 'required|string|max:255',
            'is_active' => 'boolean'
        ]);

        $cta = CtaSection::first();
        if (!$cta) {
            $cta = new CtaSection();
        }

        $cta->update($request->all());

        return redirect()->route('admin.cta.index')->with('success', 'CTA section updated successfully!');
    }
}
