<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemperatureRate extends Model
{
    use HasFactory;

    protected $table = 'temperatures';

    protected $fillable = ['patient_id', 'temperature'];

}
