<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialist extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price'
    ];

    protected function price(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => str_replace(",", "", substr($value, 4)),
        );
    }

    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
}
