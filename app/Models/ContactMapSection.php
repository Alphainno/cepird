<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMapSection extends Model
{
    protected $fillable = [
        'section_badge',
        'section_title',
        'section_description',
        'map_embed_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }
}
