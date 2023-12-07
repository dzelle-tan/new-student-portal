<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StudentRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
    ];

    public function classes(): HasMany
    {
        return $this->hasMany(Classes::class);
    }

    public function fee(): HasOne
    {
        return $this->hasOne(Fee::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
