<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoreValueSection extends Model
{
    protected $fillable = [
        'badge_text',
        'title',
        'subtitle',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the active core value section
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }

    /**
     * Get the core values for this section
     */
    public function coreValues()
    {
        return $this->hasMany(CoreValue::class)->where('is_active', true)->orderBy('sort_order');
    }

    /**
     * Get all core values including inactive ones
     */
    public function allCoreValues()
    {
        return $this->hasMany(CoreValue::class)->orderBy('sort_order');
    }
}
