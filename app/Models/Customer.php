<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['user'];

    protected static function booted()
    {
        self::creating(function (Customer $customer) {
            do {
                // random ref
                $ref = 'CS' . substr(
                        str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),
                        0, 8);

            } while(Customer::where('reference', $ref)->exists());

            $customer->reference = $ref;
        });
    }

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    /**
     * Define the accessor for full name
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
