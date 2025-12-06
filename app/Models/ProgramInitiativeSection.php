<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramInitiativeSection extends Model
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
     * Get the active program initiative section
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }

    /**
     * Get the programs for this section
     */
    public function programs()
    {
        return $this->hasMany(ProgramInitiative::class)->where('is_active', true)->orderBy('sort_order');
    }

    /**
     * Get all programs including inactive ones
     */
    public function allPrograms()
    {
        return $this->hasMany(ProgramInitiative::class)->orderBy('sort_order');
    }
}
