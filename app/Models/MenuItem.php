<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'title',
        'url',
        'route_name',
        'open_in_new_tab',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'open_in_new_tab' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Get all active menu items ordered by sort_order
     */
    public static function getActive()
    {
        return self::where('is_active', true)->orderBy('sort_order')->get();
    }

    /**
     * Get the URL for this menu item
     */
    public function getUrlAttribute($value)
    {
        // If route_name is set, try to generate route URL
        if ($this->route_name) {
            try {
                return route($this->route_name);
            } catch (\Exception $e) {
                return $value ?? '#';
            }
        }
        return $value ?? '#';
    }

    /**
     * Scope for active items
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordered items
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
