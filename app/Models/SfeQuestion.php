<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SfeQuestion extends Model
{
    use HasFactory;

    public function sfeAnswer(): HasMany
    {
        return $this->hasMany(SfeAnswer::class);
    }
}
