<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassSchedule extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'created_at',
        'updated_at',
    ];

   /**
     * Get the class that owns the schedule.
     */
    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id'); 
    }

    /**
     * Get the class mode that owns the schedule.
     */
    public function classMode(): BelongsTo
    {
        return $this->belongsTo(ClassMode::class);
    }

    /**
     * Get the room that owns the schedule.
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }    


    // /**
    //  * Get the professor for the class schedule.
    //  */
    // public function instructor(): BelongsTo
    // {
    //     return $this->belongsTo(Instructor::class, 'professor_id');
    // }    
}
