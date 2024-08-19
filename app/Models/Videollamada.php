<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videollamada extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'date',
        'hour',
        'enlace',
        'cita_id',
        'doctor_id',
        'patient_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function cita()
    {
        return $this->belongsTo(Citas::class);
    }
}

