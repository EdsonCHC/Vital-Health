<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastName',
        'description',
        'number',
        'age',
        'gender',
        'mail',
        'password',
        'role',
        'homeworks_id',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Categoría::class, 'category_id');
    }
}
