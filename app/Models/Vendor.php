<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

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
}
