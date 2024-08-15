<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear categorías de ejemplo
        $exams = [
            [
                'patient_id' => 1,
                'doctor_id' => 1,
                'exam_type' => "blood",
                'results' => true,
                'exam_hour' => '10:00',
                'exam_date' => '2024-08-14',
                'notes' => 'El examen esta en regla',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'patient_id' => 2,
                'doctor_id' => 2,
                'exam_type' => "urine",
                'results' => true,
                'exam_hour' => '11:00',
                'exam_date' => '2024-08-14',
                'notes' => 'El examen esta en regla',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Añadir más examenes según sea necesario
        ];


        // Insertar los registros en la base de datos
        DB::transaction(function () use ($exams) {
            DB::table('exams')->insert($exams);
        });
    }
}
