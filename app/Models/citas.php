<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    protected $fillable = [
        'state',
        'date',
        'hour',
        'description',
        'modo',
        'enlace',
        'id_patient',
        'id_category',
        'id_doctor',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Models\Usuario', 'id_patient');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Categoria', 'id_category');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor', 'id_doctor'); 
    }
}
