<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exams;
use App\Models\Doctor;
use App\Models\Usuario;

class Expedientes extends Model
{
    use HasFactory;

    protected $table = 'expedientes';

    protected $fillable = [

        'pdf_path',
        'state',
        'patient_id',
    ];

    public function patient()
    {
        return $this->belongsTo(Usuario::class, 'patient_id');
    }
}
