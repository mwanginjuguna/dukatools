<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessDetails extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'address' => 'array',
        'opening_hours' => 'array',
        'currencies_accepted' => 'array',
        'serves_cuisine' => 'array',
        'photos' => 'array',
        'social_media' => 'array',
    ];

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }
}

