<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Student;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Student
{
    use HasFactory;

    protected $fillable = [
        'message',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
