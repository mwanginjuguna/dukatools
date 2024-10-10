<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distributor extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [''];

    protected static function booted()
    {
        self::creating(function (Distributor $distributor) {
            do {
                // random ref
                $ref = 'DIST' . substr(
                        str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),
                        0, 8);

            } while(Distributor::where('reference', $ref)->exists());

            $distributor->reference = $ref;
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
