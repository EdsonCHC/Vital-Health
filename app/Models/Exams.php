<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'exam_type',
        'results',
        'exam_hour',
        'exam_date',
        'notes',
    ];
    
    public function patient()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}