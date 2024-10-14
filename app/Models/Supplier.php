<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $with = ['user',];

    protected static function booted()
    {
        self::creating(function (Supplier $supplier) {
            do {
                // random ref
                $ref = 'SP' . substr(
                        str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),
                        0, 8);

            } while(Supplier::where('reference', $ref)->exists());

            $supplier->reference = $ref;
        });
    }

    /**
     * User instance
     */
    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    /**
     * Products supplied by this supplier
     *
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Define the accessor for full name
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
