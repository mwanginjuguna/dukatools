<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * Manufacturers in this location
     */
    public function manufacturers(): HasMany
    {
        return $this->hasMany(Manufacturer::class);
    }

    /**
     * Suppliers in this location
     */
    public function suppliers(): HasMany
    {
        return $this->hasMany(Supplier::class);
    }
}
