<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramOverviewSection extends Model
{
    use HasFactory;

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
     * Get the active program overview section.
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }
}
