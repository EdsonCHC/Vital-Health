<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class heartRate extends Model
{
    use HasFactory;

    protected $table = 'heart_rate';

    protected $fillable = ['id_patient', 'rate'];
}
