<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use HasFactory;

    protected $table = 'doctors';

    protected $fillable = [
        'name',
        'lastName',
        'mail',
        'specialty',
        'gender',
        'password',
        'doctor_number',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
