<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramImpactStat extends Model
{
    protected $fillable = [
        'value',
        'label',
        'description',
        'color_theme',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get active stats ordered by order.
     */
    public static function getActive()
    {
        return self::where('is_active', true)->orderBy('order')->get();
    }

    /**
     * Get color classes for styling based on color_theme.
     */
    public function getColorClasses()
    {
        $themes = [
            'blue' => [
                'gradient' => 'from-blue-50 to-blue-100',
                'border' => 'border-blue-200',
                'text' => 'text-blue-900',
            ],
            'teal' => [
                'gradient' => 'from-teal-50 to-teal-100',
                'border' => 'border-teal-200',
                'text' => 'text-teal-900',
            ],
            'amber' => [
                'gradient' => 'from-amber-50 to-amber-100',
                'border' => 'border-amber-200',
                'text' => 'text-amber-900',
            ],
            'indigo' => [
                'gradient' => 'from-indigo-50 to-indigo-100',
                'border' => 'border-indigo-200',
                'text' => 'text-indigo-900',
            ],
        ];

        return $themes[$this->color_theme] ?? $themes['blue'];
    }
}
