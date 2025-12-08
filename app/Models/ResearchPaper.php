<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ResearchPaper extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'authors',
        'description',
        'publication_date',
        'pages',
        'citations',
        'tags',
        'pdf_file',
        'icon_color',
        'is_featured',
        'is_active',
        'order',
    ];

    protected $casts = [
        'publication_date' => 'date',
        'tags' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    // Relationship with category
    public function category()
    {
        return $this->belongsTo(ResearchCategory::class, 'category_id');
    }

    // Get active papers
    public static function getActive()
    {
        return self::where('is_active', true)
                   ->with('category')
                   ->orderBy('publication_date', 'desc')
                   ->orderBy('order')
                   ->get();
    }

    // Get formatted publication date
    public function getFormattedDateAttribute()
    {
        return $this->publication_date->format('F Y');
    }

    // Search papers
    public static function search($query)
    {
        return self::where('is_active', true)
                   ->where(function($q) use ($query) {
                       $q->where('title', 'LIKE', "%{$query}%")
                         ->orWhere('authors', 'LIKE', "%{$query}%")
                         ->orWhere('description', 'LIKE', "%{$query}%");
                   })
                   ->with('category')
                   ->get();
    }

    // Filter by category
    public static function filterByCategory($categoryId)
    {
        return self::where('is_active', true)
                   ->where('category_id', $categoryId)
                   ->with('category')
                   ->orderBy('publication_date', 'desc')
                   ->get();
    }

    // Filter by year
    public static function filterByYear($year)
    {
        return self::where('is_active', true)
                   ->whereYear('publication_date', $year)
                   ->with('category')
                   ->orderBy('publication_date', 'desc')
                   ->get();
    }
}
