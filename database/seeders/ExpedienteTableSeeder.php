<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpedienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // No funicona pero no me da cabeza ahorita
        DB::table('expediente')->insert([
            [
                'nacimiento' => '1985-05-15',
                'gender' => 'Male',
                'mail' => 'juan.perez@example.com',
                'status_civil' => 'Single',
                'occupation' => 'Engineer',
                'Allergies' => 'None',
                'examen_id' => 1,
                'cita_id' => 1,
                'doctor_id' => 1,
                'patient_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nacimiento' => '1990-08-22',
                'gender' => 'Female',
                'mail' => 'maria.lopez@example.com',
                'status_civil' => 'Married',
                'occupation' => 'Teacher',
                'Allergies' => 'Peanuts',
                'examen_id' => 2,
                'cita_id' => 2,
                'doctor_id' => 2,
                'patient_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nacimiento' => '1990-08-22',
                'gender' => 'Female',
                'mail' => 'maria.lopez@example.com',
                'status_civil' => 'Married',
                'occupation' => 'Teacher',
                'Allergies' => 'Peanuts',
                'examen_id' => 2,
                'cita_id' => 2,
                'doctor_id' => 2,
                'patient_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
    }
}
