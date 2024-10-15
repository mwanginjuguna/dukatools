<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manufacturer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['location'];
    protected $withCount = ['products'];

    protected static function booted()
    {
        self::creating(function (Manufacturer $manufacturer) {
            do {
                // random ref
                $ref = 'MN' . substr(
                        str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),
                        0, 8);

            } while(Manufacturer::where('reference', $ref)->exists());

            $manufacturer->reference = $ref;
        });
    }

    /**
     * Define the accessor for full name
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Products from this manufacturer
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Location of this manufacturer
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
