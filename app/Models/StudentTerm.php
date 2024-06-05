<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentTerm extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    public function aysem(): BelongsTo
    {
        return $this->belongsTo(Aysem::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function block(): BelongsTo
    {
        return $this->belongsTo(Block::class);
    }

    public function registrationStatus(): BelongsTo
    {
        return $this->belongsTo(RegistrationStatus::class);
    }

    /**
     * Get the student that owns the term.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_no');
    }

    /**
     * Get the academic year and semester associated with the term.
     */
    public function aysem(): BelongsTo
    {
        return $this->belongsTo(Aysem::class, 'aysem_id');
    }

    /**
     * Get the program associated with the term.
     */
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    /**
     * Get the block associated with the term.
     */
    public function block(): BelongsTo
    {
        return $this->belongsTo(Block::class, 'block_id');
    }

    /**
     * Get the registration status associated with the term.
     */
    public function registrationStatus(): BelongsTo
    {
        return $this->belongsTo(RegistrationStatus::class, 'registration_status_id');
    }
}
