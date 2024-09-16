<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $table = 'recetas';

    protected $fillable = [
        'cita_id',
        'doctor_id',
        'patient_id',
        'medicine_id',
        'fecha_entrega',
        'hora_entrega',
        'titulo',
        'descripcion',
        'codigo_receta'
    ];
    protected $casts = [
        'fecha_entrega' => 'date',
        'hora_entrega' => 'datetime:H:i',
        'descripcion' => 'string',
    ];

    public function cita()
    {
        return $this->belongsTo(Citas::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function medicinas()
    {
        return $this->belongsTo(Medicina::class, 'medicine_id');
    }
}
