<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_of_copies',
    ];

    public function studentRequest(): BelongsTo
    {
        return $this->belongsTo(StudentRequest::class);
    }
}
