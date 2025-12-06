<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Founder extends Model
{
    protected $fillable = [
        'name',
        'title',
        'quote',
        'image',
        'linkedin_url',
        'twitter_url',
        'email',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the active founder
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }
}
