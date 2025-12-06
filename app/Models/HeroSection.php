<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'badge_text',
        'title_line1',
        'title_line2',
        'title_line3',
        'description',
        'button1_text',
        'button1_link',
        'button2_text',
        'button2_link',
        'founder_name',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the active hero section
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }
}
