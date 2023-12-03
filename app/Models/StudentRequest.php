<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'mode',
        'purpose',
        'receipt_no',
        'registrar_name',
        'status',
        'total',
        'date_of_payment',
        'expected_release',
        'date_requested',
        'date_received',
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

}
