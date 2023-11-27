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

    public function grades(): HasOne
    {
        return $this->HasOne(Grade::class);
    }

    public function professor(): BelongsTo
    {
        return $this->belongsTo(Professor::class);
    }

    public function sfeAnswer(): HasMany
    {
        return $this->HasMany(sfeAnswer::class);
    }

    public function sfeStatus(): HasOne
    {
        return $this->HasOne(SfeStatus::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
