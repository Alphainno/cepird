<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchHeroSection extends Model
{
    protected $fillable = [
        'badge_text',
        'title_line1',
        'title_line2',
        'subtitle',
        'background_image',
        'is_active'
    ];

    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }
}
