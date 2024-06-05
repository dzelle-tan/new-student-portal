<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentViolation extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'violation',
        'violation_date',
        'sm_reference',
        'resolution',
        'resolution_date',
        'student_no',
        'offense_type_id', // Assuming this is the foreign key to offense_types table
    ];

    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_no', 'student_no');
    }

    public function offenseType() : BelongsTo
    {
        return $this->belongsTo(OffenseType::class);
    }
}
