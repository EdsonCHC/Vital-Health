<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class LabTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear laboratorios de ejemplo
        $laboratorios = [
            [
                'nombre' => 'Lab A',
                'mail' => 'labA@example.com',
                'password' => Hash::make('password123'), // Hasheamos la contraseña
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Lab B',
                'mail' => 'labB@example.com',
                'password' => Hash::make('password456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Puedes añadir más laboratorios aquí
        ];

        // Insertar los registros en la base de datos
        DB::transaction(function () use ($laboratorios) {
            DB::table('laboratorios')->insert($laboratorios);
        });
    }
}
