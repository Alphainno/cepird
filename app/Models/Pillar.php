<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pillar extends Model
{
    protected $fillable = [
        'about_section_id',
        'title',
        'description',
        'icon',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the about section that owns the pillar
     */
    public function aboutSection(): BelongsTo
    {
        return $this->belongsTo(AboutSection::class);
    }

    /**
     * Scope to get only active pillars
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
