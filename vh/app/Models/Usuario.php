<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; //tabla de modificar

    protected $fillable = [
        'name',
        'lastName',
        'mail',
        'gender',
        'birth',
        'blood',
        'password'
    ];
    
}
