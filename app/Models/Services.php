<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'status',
        'user_id',
        'sub_category_id',
        'image_id'
    ];
}
