<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ContactHeroSection extends Model
{
    protected $fillable = [
        'badge_text',
        'title',
        'description',
        'background_image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function getActive()
    {
        return self::where('is_active', true)->first() ?? self::first();
    }

    public function getBackgroundUrlAttribute(): ?string
    {
        if (!$this->background_image) {
            return null;
        }

        return asset('storage/' . $this->background_image);
    }
}
