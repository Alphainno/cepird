<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FocusAreaSection extends Model
{
    protected $fillable = [
        'badge_text',
        'title',
        'subtitle',
        'quote',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the active focus area section
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }

    /**
     * Get the focus areas for the section
     */
    public function focusAreas(): HasMany
    {
        return $this->hasMany(FocusArea::class)->active()->ordered();
    }

    /**
     * Get all focus areas including inactive ones
     */
    public function allFocusAreas(): HasMany
    {
        return $this->hasMany(FocusArea::class)->ordered();
    }
}
