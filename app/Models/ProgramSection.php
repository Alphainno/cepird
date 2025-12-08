<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'badge_text',
        'description',
        'color_theme',
        'section_id',
        'order',
        'is_active',
        'program_category_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the active program sections ordered by order.
     */
    public static function getActive()
    {
        return self::where('is_active', true)->orderBy('order')->get();
    }

    /**
     * Get the program items for this section.
     */
    public function items()
    {
        return $this->hasMany(ProgramItem::class)->orderBy('order');
    }

    /**
     * Get active program items for this section.
     */
    public function activeItems()
    {
        return $this->hasMany(ProgramItem::class)->where('is_active', true)->orderBy('order');
    }

    /**
     * Get the category that this section belongs to.
     */
    public function category()
    {
        return $this->belongsTo(ProgramCategory::class, 'program_category_id');
    }

    /**
     * Get color classes for styling based on color_theme.
     */
    public function getColorClasses()
    {
        $themes = [
            'blue' => [
                'text' => 'text-blue-600',
                'bg' => 'bg-blue-100',
                'border' => 'hover:border-blue-300',
                'badge_bg' => 'bg-blue-100',
                'badge_text' => 'text-blue-800',
                'info_bg' => 'bg-blue-50',
                'info_border' => 'border-blue-200',
                'card_bg' => 'bg-slate-50',
            ],
            'teal' => [
                'text' => 'text-teal-600',
                'bg' => 'bg-teal-100',
                'border' => 'hover:border-teal-300',
                'badge_bg' => 'bg-teal-100',
                'badge_text' => 'text-teal-800',
                'info_bg' => 'bg-teal-50',
                'info_border' => 'border-teal-200',
                'card_bg' => 'bg-white',
            ],
            'amber' => [
                'text' => 'text-amber-600',
                'bg' => 'bg-amber-100',
                'border' => 'hover:border-amber-300',
                'badge_bg' => 'bg-amber-100',
                'badge_text' => 'text-amber-800',
                'info_bg' => 'bg-amber-50',
                'info_border' => 'border-amber-200',
                'card_bg' => 'bg-slate-50',
            ],
            'indigo' => [
                'text' => 'text-indigo-600',
                'bg' => 'bg-indigo-100',
                'border' => 'hover:border-indigo-300',
                'badge_bg' => 'bg-indigo-100',
                'badge_text' => 'text-indigo-800',
                'info_bg' => 'bg-indigo-50',
                'info_border' => 'border-indigo-200',
                'card_bg' => 'bg-white',
            ],
        ];

        return $themes[$this->color_theme] ?? $themes['blue'];
    }

    /**
     * Get the section background class based on index.
     */
    public function getSectionBgClass($index)
    {
        return $index % 2 === 0 ? 'bg-white' : 'bg-slate-50';
    }

    /**
     * Get the card background class based on index.
     */
    public function getCardBgClass($index)
    {
        return $index % 2 === 0 ? 'bg-slate-50' : 'bg-white';
    }
}
