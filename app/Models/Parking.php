<?php

// app/Models/Parking.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Parking extends Model
{
    protected $fillable = ['slot', 'entry_time', 'exit_time', 'status', 'price'];

    // Add casts for datetime fields
    protected $casts = [
        'entry_time' => 'datetime',
        'exit_time' => 'datetime',
    ];

    // Calculate duration in minutes
    public function getDurationMinutesAttribute()
    {
        // Ensure entry_time is not null before proceeding
        if (!$this->entry_time) {
            return 0;
        }

        // If exit_time is null (meaning parking is still active), use current time for duration calculation
        // Otherwise, use the stored exit_time
        $end = $this->exit_time ?? now();

        return $this->entry_time->diffInMinutes($end);
    }

    // Calculate price
    public function getCalculatedPriceAttribute()
    {
        $minutes = $this->duration_minutes;
        return intval(floor($minutes / 2)) * 5000;
    }
}