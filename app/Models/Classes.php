<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Classes extends Model
{
    use HasFactory;

    public function grade(): HasOne
    {
        return $this->hasOne(Grade::class, 'class_id');
    }

    public function professor(): BelongsTo
    {
        return $this->belongsTo(Professor::class, 'professor_id', 'professor_id');
    }

    public function sfeAnswer(): HasMany
    {
        return $this->hasMany(sfeAnswer::class);
    }

    public function sfeStatus(): HasOne
    {
        return $this->hasOne(SfeStatus::class);
    }

    public function studentRecord(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
