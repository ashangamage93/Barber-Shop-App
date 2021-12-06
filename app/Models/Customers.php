<?php

namespace App\Models;

class Customers extends \Illuminate\Foundation\Auth\User
{
	protected $guard = 'customers';
	protected $fillable = [
        'username',
        'password',
        'email',
        'created'
    ];
}
