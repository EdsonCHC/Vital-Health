<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Admin extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'name',
        'lastName',
        'mail',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
