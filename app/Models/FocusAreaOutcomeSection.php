<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FocusAreaOutcomeSection extends Model
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

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
