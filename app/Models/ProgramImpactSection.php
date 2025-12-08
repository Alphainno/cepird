<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramImpactSection extends Model
{
    protected $fillable = [
        'badge_text',
        'title',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the active impact section.
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }
}
