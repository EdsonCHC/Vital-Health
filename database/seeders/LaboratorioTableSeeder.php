<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class LaboratorioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laboratorista = [
            [
                'nombre' => 'Laboratorio Central',
                'mail' => 'lab@gmail.com',
                'password' => Hash::make('pass123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Laboratorio Clínico',
                'mail' => 'info@laboratorioclinico.com',
                'password' => Hash::make('pass123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insertar los registros en la base de datos
        DB::transaction(function () use ($laboratorista) {
            DB::table('laboratorios')->insert($laboratorista);
        });
    }

}
