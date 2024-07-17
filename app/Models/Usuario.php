<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Usuario extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;

    protected $table = 'patients'; // tabla a modificar

    protected $fillable = [
        'name',
        'lastName',
        'mail',
        'gender',
        'birth',
        'blood',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
