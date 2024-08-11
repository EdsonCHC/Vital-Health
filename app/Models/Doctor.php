<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastName',
        'number',
        'age',
        'gender',
        'mail',
        'password',
        'role',
        'category_id',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function category()
    {
        return $this->belongsTo(Categoría::class, 'category_id');
    }
}
