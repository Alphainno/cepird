<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactCtaSection extends Model
{
    protected $fillable = [
        'title',
        'description',
        'button_1_text',
        'button_1_url',
        'button_2_text',
        'button_2_url',
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
