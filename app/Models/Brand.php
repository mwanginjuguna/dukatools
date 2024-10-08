<?php

namespace App\Models;

use App\Actions\SlugGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


    protected static function booted()
    {
        self::creating(function (Brand $brand) {
            $brand->slug = SlugGenerator::generate($brand->title, $brand);
        });
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
