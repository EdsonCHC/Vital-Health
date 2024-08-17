<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Categoría extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'caracteristicas',
        'img',
        'activa',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'activa' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the name attribute.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function nombre(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucwords($value), 
            set: fn($value) => strtolower($value) 
        );
    }

    /**
     * The name of the table associated with the model.
     *
     * @var string
     */
    protected $table = 'categorias';

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'category_id');
    }
}
