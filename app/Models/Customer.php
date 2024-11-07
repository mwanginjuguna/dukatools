<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected static function booted()
    {
        self::creating(function (Customer $customer) {
            do {
                // random ref
                $ref = 'CUST' . substr(
                        str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),
                        0, 8);

            } while(Customer::where('reference', $ref)->exists());

            $customer->reference = $ref;
        });
    }

    public function location():BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function vendor():BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    /**
     * Define the accessor for full name
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
