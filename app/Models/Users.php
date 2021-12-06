<?php

namespace App\Models;

class Users extends \Illuminate\Foundation\Auth\User
{
	protected $guard = 'users';
	protected $fillable = [
        'username',
        'password',
        'email',
        'created',
		'status'
    ];
}
