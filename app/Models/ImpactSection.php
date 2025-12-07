<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImpactSection extends Model
{
    protected $fillable = [
        'badge_text',
        'title',
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
