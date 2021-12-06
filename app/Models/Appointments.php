<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable = [
        'service_id',
        'time_start',
        'time_end'
    ];
}
