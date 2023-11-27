<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentRecord extends Model
{
    use HasFactory;

    public function grade(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    public function fee(): BelongsTo
    {
        return $this->belongsTo(Fee::class);
    }
}
