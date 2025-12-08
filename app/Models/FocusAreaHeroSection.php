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

    public function getBackgroundUrlAttribute()
    {
        if (!$this->background_image) {
            return null;
        }
        
        // Check if it's an external URL (http/https)
        if (str_starts_with($this->background_image, 'http://') || str_starts_with($this->background_image, 'https://')) {
            return $this->background_image;
        }
        
        // Otherwise, it's a storage path
        return asset('storage/' . $this->background_image);
    }
}
