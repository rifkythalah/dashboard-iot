<?php

// app/Models/Parking.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Parking extends Model
{
    protected $fillable = ['slot', 'entry_time', 'exit_time', 'status', 'price'];

    // Calculate duration in minutes
    public function getDurationMinutesAttribute()
    {
        $end = $this->exit_time ? Carbon::parse($this->exit_time) : now();
        return Carbon::parse($this->entry_time)->diffInMinutes($end);
    }

    // Calculate price
    public function getCalculatedPriceAttribute()
    {
        $minutes = $this->duration_minutes;
        return intval(floor($minutes / 2)) * 5000;
    }
}