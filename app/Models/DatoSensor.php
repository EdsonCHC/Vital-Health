<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatoSensor extends Model
{
    use HasFactory;

    protected $table = 'datos_sensores';

    protected $fillable = [
        'temperatura',
        'pulsos',
    ];

    public $timestamps = false; // La tabla ya tiene un campo de timestamp
}
