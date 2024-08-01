<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Doctor extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;

    protected $table = 'doctors';

    protected $fillable = [
        'name',
        'lastName',
        'mail',
        'specialty',
        'gender',
        'birth',
        'password',
        'doctor_number',
    ];

    protected $hidden = 'password';
}
