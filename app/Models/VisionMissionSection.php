<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisionMissionSection extends Model
{
    protected $fillable = [
        'vision_icon',
        'vision_title',
        'vision_paragraph1',
        'vision_paragraph2',
        'mission_icon',
        'mission_title',
        'mission_point1',
        'mission_point2',
        'mission_point3',
        'mission_point4',
        'mission_point5',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the active vision mission section
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }

    /**
     * Get mission points as an array
     */
    public function getMissionPointsAttribute(): array
    {
        return array_filter([
            $this->mission_point1,
            $this->mission_point2,
            $this->mission_point3,
            $this->mission_point4,
            $this->mission_point5,
        ]);
    }
}
