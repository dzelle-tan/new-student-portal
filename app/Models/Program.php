<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'program_title', 
        'program_code', 
        'major', 
        'degree', 
        'degree_level', 
        'num_credits', 
        'college_id'
    ];    

    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class);
    }

    /**
     * Get the terms associated with the program.
     */
    public function terms(): HasMany
    {
        return $this->hasMany(StudentTerm::class);
    }

    /**
     * Get the blocks associated with the program.
     */
    public function blocks(): HasMany
    {
        return $this->hasMany(Block::class);
    }        
}
