<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutIntroductionSection extends Model
{
    protected $fillable = [
        'badge_text',
        'title_line1',
        'title_line2',
        'paragraph1',
        'paragraph2',
        'paragraph3',
        'image_url',
        'image',
        'is_active'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public static function getActive()
    {
        return self::active()->first();
    }
}
