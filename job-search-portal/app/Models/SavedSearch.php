<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SavedSearch extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'published_from',
        'published_to',
        'experience_level',
        'field_of_expertise',
        'conditions',
        'is_active',
        'last_matched_at',
    ];

    protected function casts(): array
    {
        return [
            'published_from' => 'date',
            'published_to' => 'date',
            'conditions' => 'array',
            'is_active' => 'boolean',
            'last_matched_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}