<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentRequest extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'student_request_mode_id',
        'purpose',
        'receipt_no',
        'registrar_name',
        'student_request_status_id', 
        'total',
        'date_of_payment',
        'expected_release',
        'date_requested',
        'date_of_payment',
        'date_received',
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(RequestedDocument::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function studentRequestStatus(): BelongsTo
    {
        return $this->belongsTo(StudentRequestStatus::class);
    }

    public function studentRequestMode(): BelongsTo
    {
        return $this->belongsTo(StudentRequestMode::class);
    }
}
