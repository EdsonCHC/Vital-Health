<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicina extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo',
        'stock',
        'estado',
    ];

    public function recetas()
    {
        return $this->belongsToMany(Receta::class, 'receta_medicina')
                    ->withPivot('cantidad');
    }
}
