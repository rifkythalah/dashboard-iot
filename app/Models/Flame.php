<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flame extends Model
{
    protected $fillable = [
        'sensor_id', 'indicator', 'level', 'status', 'last_update'
    ];
    public $timestamps = true;
}