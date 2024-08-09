<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoría extends Model
{
    use HasFactory;

    protected $table = 'Categorias';

    protected $fillable = [
        'nombre',
        'descripción',
        'características',
        'img',
    ];
}
