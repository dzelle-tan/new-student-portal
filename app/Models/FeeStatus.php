<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FeeStatus extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];
    
    /**
     * Get the student records for the fee status.
     */
    public function studentRecords(): HasMany
    {
        return $this->hasMany(StudentRecord::class);
    }

}
