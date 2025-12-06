<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderSetting extends Model
{
    protected $fillable = [
        'logo',
        'brand_name',
        'tagline',
        'show_tagline',
        'is_active',
    ];

    protected $casts = [
        'show_tagline' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Get the active header settings
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }
}
