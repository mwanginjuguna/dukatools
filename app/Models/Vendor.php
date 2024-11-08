<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App/Models/Vendor - A seller profile on the app
 * @property string $reference
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 */
class Vendor extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $with = ['user', 'businesses'];
    protected $withCount = ['businesses', 'customers', 'products', 'orders'];

    protected static function booted()
    {
        static::creating(function (Vendor $vendor) {
            do {
                // random ref
                $ref = 'VEN' . substr(
                        str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),
                        0, 8);

            } while(Vendor::where('reference', $ref)->exists());

            $vendor->reference = $ref;
        });
    }

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    /**
     * Define the accessor for name
     */
    public function getNameAttribute(): string
    {
        return $this->fullName;
    }

    /**
     * Define the accessor for full name
     */
    public function getFullNameAttribute(): string
    {
        return "$this->first_name $this->last_name";
    }

    /**
     * Businesses / shops/ stores owned by this vendor/user
     */
    public function businesses(): HasMany
    {
        return $this->hasMany(Business::class);
    }

    /**
     * Customers of this vendor/user
     */
    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }

    /**
     * Inventories belonging to this vendor/user
     */
    public function inventories(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }

    /**
     * Orders for this vendor
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Products for this vendor
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Subscription
     */
    public function subscription(): HasOne
    {
        return $this->hasOne(Subscription::class);
    }
}
