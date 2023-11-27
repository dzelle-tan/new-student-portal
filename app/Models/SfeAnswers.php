<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SfeAnswers extends Model
{
    use HasFactory;

    public function classes(): BelongsTo
    {
        return $this->belongsTo(Classes::class);
    }

    public function professor(): BelongsTo
    {
        return $this->belongsTo(Professor::class);
    }

    public function sfeQuestion(): BelongsTo
    {
        return $this->belongsTo(SfeQuestion::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
