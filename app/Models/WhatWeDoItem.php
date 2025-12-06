<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatWeDoItem extends Model
{
    protected $fillable = [
        'what_we_do_section_id',
        'icon',
        'title',
        'description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the section this item belongs to
     */
    public function section()
    {
        return $this->belongsTo(WhatWeDoSection::class, 'what_we_do_section_id');
    }

    /**
     * Scope for active items
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
