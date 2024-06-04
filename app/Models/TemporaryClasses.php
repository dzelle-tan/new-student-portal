<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryClasses extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_code',
        'course_name',
        'units',
        'days_time',
        'room',
    ];

    protected $table = 'temporary_classes';
}
