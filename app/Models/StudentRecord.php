<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentRecord extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the student that owns the record.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_no');
    }

    /**
     * Get the fee status associated with the student record.
     */
    public function feeStatus(): BelongsTo
    {
        return $this->belongsTo(FeeStatus::class);
    }

    /**
     * Get the academic year that owns the student record.
     */
    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }    
}
