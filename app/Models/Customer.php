<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Customer extends Model
{
    use HasFactory;

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

    protected $guarded = ['id'];

    /**
     * Define the accessor for full name
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
