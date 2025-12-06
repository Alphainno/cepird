<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'main_title',
        'subtitle',
        'is_active',
        'pillar1_title',
        'pillar1_description',
        'pillar1_icon',
        'pillar2_title',
        'pillar2_description',
        'pillar2_icon',
        'pillar3_title',
        'pillar3_description',
        'pillar3_icon',
        'pillar4_title',
        'pillar4_description',
        'pillar4_icon',
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
}
