<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutHeroSection extends Model
{
    protected $fillable = [
        'title_line1',
        'title_line2',
        'subtitle',
        'tag1',
        'tag2',
        'tag3',
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
