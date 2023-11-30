<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'document_name',
        'no_of_copies',
    ];

    public function studentRequest(): BelongsTo
    {
        return $this->belongsTo(StudentRequest::class);
    }
}
