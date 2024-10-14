<?php

namespace App\Models;

use App\Actions\SlugGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Category for posts, products, etc
 * @property string $name
 */
class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $withCount = ['products', 'brands', 'posts', 'subCategories'];

    protected static function booted()
    {
        self::creating(function (Category $category) {
            $category->slug = SlugGenerator::generate($category->name, $category);
        });
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class);
    }

    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
