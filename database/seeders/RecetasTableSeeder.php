<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RecetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recetas = [
            [
                'cita_id' => 1, 
                'codigo_receta' => Str::random(10),
                'fecha_entrega' => Carbon::now()->format('Y-m-d'),
                'hora_entrega' => Carbon::now()->format('H:i:s'),
                'titulo' => 'Receta para resfriado común',
                'descripcion' => 'Tomar un jarabe y descansar.',
                'doctor_id' => 1, 
                'patient_id' => 1, 
                'estado' => 'pendiente',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cita_id' => 2,
                'codigo_receta' => Str::random(10),
                'fecha_entrega' => Carbon::yesterday()->format('Y-m-d'),
                'hora_entrega' => Carbon::yesterday()->format('H:i:s'),
                'titulo' => 'Receta para dolor de cabeza',
                'descripcion' => 'Tomar ibuprofeno cada 8 horas.',
                'doctor_id' => 2,
                'patient_id' => 2,
                'estado' => 'completada',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        // Insertar los registros en la base de datos
        DB::transaction(function () use ($recetas) {
            DB::table('recetas')->insert($recetas);
        });
    }
}
