<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Laboratorio extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'laboratorios'; // Correct table name

    protected $fillable = [
        'nombre',
        'mail',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
