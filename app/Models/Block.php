<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Block extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the terms associated with the block.
     */
    public function terms(): HasMany
    {
        return $this->hasMany(StudentTerm::class);
    }

    /**
     * Get the program that owns the block.
     */
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Get the academic year and semester that owns the block.
     */
    public function aysem(): BelongsTo
    {
        return $this->belongsTo(Aysem::class);
    }    
}
