<?php

namespace App\Models;

use Database\Seeders\SfeAnswer;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'student_no' => 'integer',
    ];

    public function classes(): HasMany
    {
        return $this->hasMany(Classes::class, 'class_id');
    }

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    public function sfeAnswers(): HasMany
    {
        return $this->hasMany(SfeAnswer::class);
    }

    public function sfeStatus(): HasOne
    {
        return $this->HasOne(SfeStatus::class);
    }

    public function studentRequest(): HasMany
    {
        return $this->hasMany(studentRequest::class);
    }

    public function studentViolation(): HasMany
    {
        return $this->hasMany(studentViolation::class);
    }

    public function chirps(): HasMany
    {
        return $this->hasMany(Chirp::class);
    }
}
