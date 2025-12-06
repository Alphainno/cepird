<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoreValue extends Model
{
    protected $fillable = [
        'core_value_section_id',
        'icon',
        'title',
        'description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the section this core value belongs to
     */
    public function section()
    {
        return $this->belongsTo(CoreValueSection::class, 'core_value_section_id');
    }

    /**
     * Scope for active core values
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordered core values
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
