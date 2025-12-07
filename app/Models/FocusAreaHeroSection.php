<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FocusAreaHeroSection extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'background_image',
        'is_active'
    ];

    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }
}
