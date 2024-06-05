<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];
    /**
     * Get the classes for the professor.
     */
    public function classes()
    {
        return $this->hasMany(Classes::class);
    }    
}
