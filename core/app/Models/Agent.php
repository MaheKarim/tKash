<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Agent extends Authenticatable
{
    protected $hidden = [
        'password', 'remember_token',
    ];
}
