<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramDoc extends Model
{
    use HasFactory;

    protected $table = 'program_doc';

    protected $fillable = [
        'homeworks',
        'notes',
        'doctor_id'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
