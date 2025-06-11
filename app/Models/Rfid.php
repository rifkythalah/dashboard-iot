<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rfid extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_rfid', 'rfid', 'status_rfid', 'jumlah_rfid', 'activity', 'activity_time'
    ];
}