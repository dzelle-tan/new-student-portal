<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OffenseType extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = ['type'];

    public function violations() : HasMany
    {
        return $this->hasMany(StudentViolation::class, 'offense_type_id');
    }
}
