<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MissionPoint extends Model
{
    protected $fillable = [
        'vision_section_id',
        'point',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the vision section that owns the mission point
     */
    public function visionSection(): BelongsTo
    {
        return $this->belongsTo(VisionSection::class);
    }

    /**
     * Scope to get only active mission points
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
