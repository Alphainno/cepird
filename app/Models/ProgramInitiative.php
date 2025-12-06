<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramInitiative extends Model
{
    protected $fillable = [
        'program_initiative_section_id',
        'icon',
        'title',
        'color',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the section this program belongs to
     */
    public function section()
    {
        return $this->belongsTo(ProgramInitiativeSection::class, 'program_initiative_section_id');
    }

    /**
     * Get the items for this program
     */
    public function items()
    {
        return $this->hasMany(ProgramInitiativeItem::class)->where('is_active', true)->orderBy('sort_order');
    }

    /**
     * Get all items including inactive ones
     */
    public function allItems()
    {
        return $this->hasMany(ProgramInitiativeItem::class)->orderBy('sort_order');
    }

    /**
     * Scope for active programs
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
