<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyPlanValidations extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_no', 
        'date_of_request',
        'status',
        'study_plan',
    ];
    protected $table = 'study_plan_validations';
}
