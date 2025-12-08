<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramCategory extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'color',
        'anchor_link',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function getActive()
    {
        return self::where('is_active', true)
            ->orderBy('order')
            ->get();
    }

    public function getColorClasses()
    {
        $colorMap = [
            'blue' => [
                'bg' => 'bg-blue-100',
                'hover' => 'group-hover:bg-blue-200',
                'border' => 'hover:border-blue-200',
                'text' => 'text-blue-600',
                'hover_text' => 'hover:text-blue-700',
            ],
            'teal' => [
                'bg' => 'bg-teal-100',
                'hover' => 'group-hover:bg-teal-200',
                'border' => 'hover:border-teal-200',
                'text' => 'text-teal-600',
                'hover_text' => 'hover:text-teal-700',
            ],
            'amber' => [
                'bg' => 'bg-amber-100',
                'hover' => 'group-hover:bg-amber-200',
                'border' => 'hover:border-amber-200',
                'text' => 'text-amber-600',
                'hover_text' => 'hover:text-amber-700',
            ],
            'indigo' => [
                'bg' => 'bg-indigo-100',
                'hover' => 'group-hover:bg-indigo-200',
                'border' => 'hover:border-indigo-200',
                'text' => 'text-indigo-600',
                'hover_text' => 'hover:text-indigo-700',
            ],
        ];

        return $colorMap[$this->color] ?? $colorMap['blue'];
    }
}
