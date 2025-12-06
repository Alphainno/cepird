<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VisionSection extends Model
{
    protected $fillable = [
        'vision_title',
        'vision_heading',
        'vision_description',
        'mission_title',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the active vision section
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }

    /**
     * Get the mission points for the vision section
     */
    public function missionPoints(): HasMany
    {
        return $this->hasMany(MissionPoint::class)->active()->ordered();
    }

    /**
     * Get all mission points including inactive ones
     */
    public function allMissionPoints(): HasMany
    {
        return $this->hasMany(MissionPoint::class)->ordered();
    }
}
