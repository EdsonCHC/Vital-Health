<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exams;
use App\Models\citas;
use App\Models\Doctor;
use App\Models\Usuario;

class Expediente extends Model
{
    use HasFactory;

    protected $table = 'expediente';

    protected $fillable = [
        'Nombre',
        'nacimiento',
        'gender',
        'mail',
        'status_civil',
        'occupation',
        'Allergies',
        'examen_id',
        'cita_id',
        'doctor_id',
        'patient_id',
    ];

    public function exam()
    {
        return $this->belongsTo(Exams::class);
    }

    public function cita()
    {
        return $this->belongsTo(citas::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Usuario::class);
    }
}
