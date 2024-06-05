<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegistrationStatus extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the terms associated with the registration status.
     */
    public function terms(): HasMany
    {
        return $this->hasMany(StudentTerm::class, 'registration_status_id');
    }

}
