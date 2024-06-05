<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aysem extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

     /**
     * Get the academic year that owns the aysem.
     */
    // public function academicYear(): BelongsTo
    // {
    //     return $this->belongsTo(AcademicYear::class);
    // }

    /**
     * Get the terms associated with the academic year and semester.
     */
    public function terms(): HasMany
    {
        return $this->hasMany(StudentTerm::class, 'aysem_id');
    }

    /**
     * Get the blocks associated with the academic year and semester.
     */
    public function blocks(): HasMany
    {
        return $this->hasMany(Block::class, 'aysem_id');
    }    
}
