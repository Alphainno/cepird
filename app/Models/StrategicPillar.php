<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrategicPillar extends Model
{
    protected $fillable = [
        'badge_text',
        'section_title',
        'title',
        'description',
        'icon',
        'color_theme',
        'link_href',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
