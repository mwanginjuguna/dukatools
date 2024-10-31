<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function (Employee $employee) {
            do {
                // random ref
                $ref = 'EMP' . substr(
                        str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),
                        0, 8);

            } while(Employee::where('reference', $ref)->exists());

            $employee->reference = $ref;
        });
    }

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function employer(): HasOneThrough
    {
        return $this->hasOneThrough(Vendor::class, Business::class);
    }
}
