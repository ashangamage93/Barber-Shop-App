<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdPosts extends Model
{
    protected $fillable = [
        'content',
        'time_start',
        'time_end'
    ];
}
