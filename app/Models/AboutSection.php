<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AboutSection extends Model
{
    protected $fillable = [
        'main_title',
        'subtitle',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the active about section
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }

    /**
     * Get the pillars for the about section
     */
    public function pillars(): HasMany
    {
        return $this->hasMany(Pillar::class)->active()->ordered();
    }

    /**
     * Get all pillars including inactive ones
     */
    public function allPillars(): HasMany
    {
        return $this->hasMany(Pillar::class)->ordered();
    }
}
