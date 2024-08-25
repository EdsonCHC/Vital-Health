<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MedicinaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicinas = [
            [
                'nombre' => 'Paracetamol',
                'descripcion' => 'Medicamento para el dolor y fiebre.',
                'tipo' => 'Analgésico',
                'stock' => 100,
                'estado' => 'Disponible',
            ],
            [
                'nombre' => 'Ibuprofeno',
                'descripcion' => 'Medicamento antiinflamatorio.',
                'tipo' => 'Anti-inflamatorio',
                'stock' => 50,
                'estado' => 'Disponible',
            ],
            [
                'nombre' => 'Amoxicilina',
                'descripcion' => 'Antibiótico para infecciones bacterianas.',
                'tipo' => 'Antibiótico',
                'stock' => 75,
                'estado' => 'Disponible',
            ],
            [
                'nombre' => 'Omeprazol',
                'descripcion' => 'Medicamento para reducir la acidez estomacal.',
                'tipo' => 'Antiácido',
                'stock' => 200,
                'estado' => 'Disponible',
            ],
        ];
        // Insertar los registros en la base de datos
        DB::transaction(function () use ($medicinas) {
            DB::table('medicinas')->insert($medicinas);
        });
    }
}
