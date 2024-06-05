<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $guarded = [
        'created_at',
        'updated_at',
    ];
 
    /**
     * Get the schedules for the class.
     */
    public function classSchedules(): HasMany
    {
        return $this->hasMany(ClassSchedule::class, 'class_id');
    }

    /**
     * Get the block that owns the class.
     */
    public function block(): BelongsTo
    {
        return $this->belongsTo(Block::class, 'block_id');
    }
    
    /**
     * Get the course that owns the class.
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    
    /**
     * Get the grades for the class.
     */
    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class, 'class_id');
    }    
    
    // /**
    //  * Get the professor for the class.
    //  */
    // public function instructor()
    // {
    //     return $this->belongsTo(Instructor::class);
    // }    
}
