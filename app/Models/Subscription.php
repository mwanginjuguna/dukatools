<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['status'];

    protected static function booted()
    {
        static::creating(function (Subscription $subscription) {
            do {
                // random ref
                $ref = 'SUB' . substr(
                        str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),
                        0, 8);

            } while(Subscription::where('reference', $ref)->exists());

            $subscription->reference = $ref;
        });
    }

}
