<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Fee extends Model
{
    use HasFactory;

    public function studentRecord(): HasOne
    {
        return $this->HasOne(StudentRecord::class);
    }
}
