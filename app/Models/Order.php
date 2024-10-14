<?php

namespace App\Models;

use App\Actions\SlugGenerator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are not mass assignable.
     */
    protected $guarded = [];

    protected $with = ['user', 'orderItems'];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'total' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'is_paid' => 'boolean'
    ];


    protected static function booted()
    {
        self::creating(function (Order $order) {
            do {
                // random ref
                $ref = 'O' . substr(
                        str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),
                        0, 8);

            } while(Order::where('reference', $ref)->exists());

            $order->reference = $ref;
        });
    }

    /**
     * Get the order items associated with this order.
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_items');
    }

    /**
     * Scope a query to only include orders with a specific status.
     */
    public function scopeStatus(Builder $query, string $status): Builder
    {
        return $query->where('status', $status);
    }

    public function scopeGetYearOrders(Builder $query, int $year): Builder
    {
        return $query->whereYear('created_at', $year);
    }
}
