<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    protected $fillable = [
        'logo',
        'brand_name',
        'description',
        'email',
        'phone',
        'address',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'instagram_url',
        'youtube_url',
        'copyright_text',
        'show_newsletter',
        'newsletter_title',
        'is_active',
    ];

    protected $casts = [
        'show_newsletter' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Get the active footer setting
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first() ?? new self();
    }
}
