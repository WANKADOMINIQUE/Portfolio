<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'company', 'role', 'location', 'employment_type',
        'start_date', 'end_date', 'is_current',
        'description', 'technologies', 'highlights',
        'company_logo', 'company_url', 'display_order',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
        'technologies' => 'array',
        'highlights' => 'array',
        'display_order' => 'integer',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderByDesc('is_current')
                     ->orderByDesc('start_date');
    }
}
