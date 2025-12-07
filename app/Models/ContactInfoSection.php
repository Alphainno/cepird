<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfoSection extends Model
{
    protected $fillable = [
        'section_badge',
        'section_title',
        'section_description',
        'office_title',
        'office_address',
        'email_title',
        'email',
        'email_subtitle',
        'phone_title',
        'phone',
        'phone_subtitle',
        'website_title',
        'website',
        'website_subtitle',
        'form_title',
        'form_description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function getActive()
    {
        return self::where('is_active', true)->first() ?? self::first();
    }
}
