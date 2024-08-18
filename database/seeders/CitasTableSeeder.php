<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CitasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $citas = [
            [
                'state' => '1',
                'date' => '2024-08-20',
                'hour' => '10:00:00',
                'description' => 'Consulta general de seguimiento.',
                'modo' => 'Presencial',
                'link' => 'https://meet.example.com/123456',
                'published_at' => Carbon::now(),
                'category_id' => 2,
                // No incluimos doctor_id para dejarlo vacío
                'patient_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'state' => '0',
                'date' => '2024-08-22',
                'hour' => '14:30:00',
                'description' => 'Consulta para revisión de exámenes de laboratorio.',
                'modo' => 'Virtual',
                'link' => 'https://meet.example.com/123456',
                'published_at' => Carbon::now(),
                'category_id' => 1,
                // No incluimos doctor_id para dejarlo vacío
                'patient_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'state' => '1',
                'date' => '2024-08-25',
                'hour' => '09:00:00',
                'description' => 'Primera consulta de pediatría.',
                'modo' => 'Presencial',
                'link' => 'https://meet.example.com/123456',
                'published_at' => Carbon::now(),
                'category_id' => 3,
                // No incluimos doctor_id para dejarlo vacío
                'patient_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insertar los registros en la base de datos
        DB::transaction(function () use ($citas) {
            DB::table('citas')->insert($citas);
        });
    }
}
