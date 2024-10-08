<?php

namespace App\Models;

use App\Actions\SlugGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function (Product $product) {
            do {
                // random ref
                $ref = 'PR' . substr(
                        str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),
                        0, 8);

            } while(Product::where('reference', $ref)->exists());

            $product->reference = $ref;

            // generate unique slug
            $product->slug = SlugGenerator::generate($product->title, $product);
        });
    }

    /**
     * Get the product image URL.
     */
    public function getImageUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->image);
    }

    /**
     * In addition to description, a product should have key features.
     * These are used to describe the main selling points for a product.
     */
    public function productFeatures(): HasMany
    {
        return $this->hasMany(ProductFeature::class);
    }

    /**
     * Ratings - A user/customer should be able to rate products
     * they have purchased. A rating scale is 1.0 to 5.0
     */
    public function productRatings(): HasMany
    {
        return $this->hasMany(ProductRating::class);
    }

    /**
     * Reviews - A customer should be able to review a product they
     * have purchased.
     */
    public function productReviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    /**
     * Orders
     */
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_items');
    }

    /**
     * Images
     */
    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImages::class);
    }

    /**
     * Scope a query to only include active products.
     */
    public function scopeActive($query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('is_active', true);
    }
}
