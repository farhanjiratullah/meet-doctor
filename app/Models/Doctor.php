<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'specialist_id',
        'name',
        'fee',
        'photo'
    ];

    protected function fee(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => str_replace(",", "", substr($value, 4)),
        );
    }

    public function specialist(): BelongsTo
    {
        return $this->belongsTo(Specialist::class);
    }

    public function appointments(): HasMany {
        return $this->hasMany(Appointment::class);
    }
}
