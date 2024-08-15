<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'batch_number',
        'quantity',
        'expiration_date',
        'description',
        'doctor_id',
        // 'laboratorist_id',
    ];

    /**
     * Get the doctor that owns the medicine.
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Get the laboratorist that owns the medicine.
     */
    // public function laboratorist()
    // {
    //     return $this->belongsTo(Laboratorist::class);
    // }
}
