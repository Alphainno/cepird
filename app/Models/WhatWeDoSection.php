<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatWeDoSection extends Model
{
    protected $fillable = [
        'badge_text',
        'title',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the active what we do section
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }

    /**
     * Get the items for this section
     */
    public function items()
    {
        return $this->hasMany(WhatWeDoItem::class)->where('is_active', true)->orderBy('sort_order');
    }

    /**
     * Get all items including inactive ones
     */
    public function allItems()
    {
        return $this->hasMany(WhatWeDoItem::class)->orderBy('sort_order');
    }
}
