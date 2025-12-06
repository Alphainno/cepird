<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FocusArea extends Model
{
    protected $fillable = [
        'focus_area_section_id',
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
     * Get the focus area section that owns the focus area
     */
    public function focusAreaSection(): BelongsTo
    {
        return $this->belongsTo(FocusAreaSection::class);
    }

    /**
     * Scope to get only active focus areas
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order by sort_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
