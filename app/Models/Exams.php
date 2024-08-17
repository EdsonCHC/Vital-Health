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
        'pdf_file', 
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
        return $this->belongsTo(citas::class);
    }
}
