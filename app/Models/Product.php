<?php

namespace App\Models;

use App\Actions\SlugGenerator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * App/Models/Product
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $reference
 * @property string $sku
 * @property string $supplier_sku
 * @property string $description
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id'];

    protected $with = ['productVariations', 'vendor', 'supplier', 'manufacturer', 'category', 'subCategory', 'brand', 'returnPolicy'];

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
                $ref = 'PD' . substr(
                        str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),
                        0, 8);

            } while(Product::where('reference', $ref)->exists());

            $product->reference = $ref;

            // generate unique slug
            $product->slug = SlugGenerator::generate($product->name, $product);
            //$product->sku = $product->sku !== null ? $product->sku : Str::lower($product->reference);
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
     * Product variations e.g color, size, material
     */
    public function productVariations(): HasMany
    {
        return $this->hasMany(ProductVariation::class);
    }

    /**
     * InventoryItem of this product
     */
    public function inventoryItem(): HasOne
    {
        return $this->hasOne(InventoryItem::class);
    }

    /**
     * User of this product
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Vendor of this product
     */
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    /**
     * Supplier of this product
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Manufacturer of this product
     */
    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }

    /**
     * Brand of this product
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Category of this product
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Sub-Category of this product.
     */
    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    /**
     * Return Policy for this product.
     */
    public function returnPolicy(): BelongsTo
    {
        return $this->belongsTo(ReturnPolicy::class);
    }

    /**
     * Scope a query to only include active products.
     */
    public function scopeActive($query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Calculate total sales from the product
     * @param Builder $query
     * @return Builder
     */
    public function scopeWithTotalSales(Builder $query): Builder
    {
        return $query->select('products.*')
            ->withCount(['orders as total_sales' => function ($query) {
                $query->select(DB::raw("SUM(order_items.quantity * order_items.price)"));
            }]);
    }
}
