<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_section_id',
        'title',
        'icon',
        'duration',
        'description',
        'features_title',
        'features',
        'metadata',
        'info_label',
        'info_value',
        'order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'metadata' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get the section that owns this item.
     */
    public function section()
    {
        return $this->belongsTo(ProgramSection::class, 'program_section_id');
    }

    /**
     * Scope to get active items.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order by order field.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    /**
     * Get formatted metadata info.
     */
    public function getMetadataInfo()
    {
        if (!$this->metadata) {
            return null;
        }

        $info = [];
        foreach ($this->metadata as $key => $value) {
            $info[] = [
                'label' => ucfirst(str_replace('_', ' ', $key)),
                'value' => $value,
            ];
        }

        return $info;
    }
}
