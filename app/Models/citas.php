<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citas extends Model
{
    use HasFactory;

    protected $fillable = [
        'state',
        'date',
        'hour',
        'description',
        'id_patient',
        'id_doctor',
        'modo',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Models\patients', 'id_patient');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\doctors', 'id_doctor');
    }
}
