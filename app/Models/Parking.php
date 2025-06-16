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
        if (!$this->entry_time) {
            return 0;
        }

        if ($this->status === 'done' && $this->exit_time) {
            return $this->entry_time->diffInMinutes($this->exit_time);
        }

        return $this->entry_time->diffInMinutes(now());
    }

    // Calculate price
    public function getCalculatedPriceAttribute()
    {
        $minutes = $this->duration_minutes;
        return intval(floor($minutes / 2)) * 5000;
    }
}