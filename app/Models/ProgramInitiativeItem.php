<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramInitiativeItem extends Model
{
    protected $fillable = [
        'program_initiative_id',
        'text',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the program this item belongs to
     */
    public function program()
    {
        return $this->belongsTo(ProgramInitiative::class, 'program_initiative_id');
    }

    /**
     * Scope for active items
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
