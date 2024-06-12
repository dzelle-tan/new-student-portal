<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LOARequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_no', 
        'date_of_request',
        'status',
        'study_plan',
        'loa_form',
        'letter_of_request',
        'note_of_undertaking',
        'clearance'
    ];
    protected $table = 'l_o_a_requests';
}
