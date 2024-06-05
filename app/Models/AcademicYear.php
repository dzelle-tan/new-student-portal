<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcademicYear extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'academic_year_code', 
        'date_start', 
        'date_end'
    ];

    /**
     * Get the aysems for the academic year.
     */
    public function aysems(): HasMany
    {
        return $this->hasMany(Aysem::class);
    }

    /**
     * Get the student records for the academic year.
     */
    public function studentRecords()
    {
        return $this->hasMany(StudentRecord::class);
    }    
}
