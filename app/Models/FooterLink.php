<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterLink extends Model
{
    protected $fillable = [
        'title',
        'url',
        'section',
        'open_in_new_tab',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'open_in_new_tab' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Get all active footer links ordered by sort_order
     */
    public static function getActive()
    {
        return self::where('is_active', true)->orderBy('sort_order')->get();
    }

    /**
     * Get active quick links
     */
    public static function getQuickLinks()
    {
        return self::where('is_active', true)
            ->where('section', 'quick_links')
            ->orderBy('sort_order')
            ->get();
    }

    /**
     * Get active legal links
     */
    public static function getLegalLinks()
    {
        return self::where('is_active', true)
            ->where('section', 'legal')
            ->orderBy('sort_order')
            ->get();
    }

    /**
     * Scope for active items
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordered items
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
