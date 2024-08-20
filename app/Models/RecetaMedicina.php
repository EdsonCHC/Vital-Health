<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecetaMedicina extends Model
{
    protected $table = 'receta_medicina'; 
    protected $fillable = ['receta_id', 'medicina_id', 'cantidad'];
}
