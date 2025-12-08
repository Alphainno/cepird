<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ResearchCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'color',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Automatically generate slug from name
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    // Relationship with research papers
    public function papers()
    {
        return $this->hasMany(ResearchPaper::class, 'category_id');
    }

    // Get active categories
    public static function getActive()
    {
        return self::where('is_active', true)
                   ->orderBy('order')
                   ->get();
    }

    // Get paper count for category
    public function getPaperCountAttribute()
    {
        return $this->papers()->where('is_active', true)->count();
    }
}
