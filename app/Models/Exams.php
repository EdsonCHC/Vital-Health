<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    use HasFactory;

    protected $fillable = [
        'state',
        'patient_id',
        'cita_id',
        'doctor_id',
        'exam_type',
        'exam_date',
        'notes',
    ];

    /**
     * Define la relación con el modelo Patient.
     */
    public function patient()
    {
        return $this->belongsTo(Usuario::class);
    }

    /**
     * Define la relación con el modelo Doctor.
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Define la relación con el modelo Cita.
     */
    public function cita()
    {
        return $this->belongsTo(Citas::class);
    }
}
