<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function (Inventory $inventory) {
            do {
                // random ref
                $ref = 'IVT' . substr(
                        str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),
                        0, 8);

            } while(Inventory::where('reference', $ref)->exists());

            $inventory->reference = $ref;
        });
    }


    public function inventoryItems(): HasMany
    {
        return $this->hasMany(InventoryItem::class);
    }

    /*
     * Products in this inventory
     */
    public function products(): HasManyThrough
    {
        return $this->hasManyThrough(Product::class, InventoryItem::class);
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }
}
