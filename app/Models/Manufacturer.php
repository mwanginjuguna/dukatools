<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manufacturer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected static function booted()
    {
        self::creating(function (Manufacturer $manufacturer) {
            do {
                // random ref
                $ref = 'MN' . substr(
                        str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),
                        0, 8);

            } while(Manufacturer::where('reference', $ref)->exists());

            $manufacturer->reference = $ref;
        });
    }

    /**
     * User instance
     */
    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

}
