<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'patients'; // tabla a modificar

    protected $fillable = [
        'name', 'lastName', 'mail', 'address','gender', 'birth', 'blood', 'password', 'img'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
