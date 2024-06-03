<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// This is the temporary validations model

class Validation extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'student_no',
        'yearlvl',
        'daterequest',
        'status',
        'validation_pdfs',
        'studentprograms',
        'study_plan_course_code',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'daterequest' => 'date',
    ];

    protected $table = 'temporary_validations';
}
