<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfigPayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'fee',
        'vat'
    ];

    protected function fee(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => str_replace(",", "", substr($value, 4)),
        );
    }
}
