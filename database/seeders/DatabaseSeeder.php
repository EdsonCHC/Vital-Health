<?php

namespace Database\Seeders;

use App\Models\citas;
use App\Models\Usuario;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // citas::factory(2)->create();

        // Crear pacientes de ejemplo
        $patients = [
            [
                'name' => 'John',
                'lastName' => 'Doe',
                'mail' => 'john.doe@example.com',
                'gender' => 'male',
                'birth' => '1989-12-22',
                'blood' => 'O+',
                'password' => Hash::make('password123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Jane',
                'lastName' => 'Smith',
                'mail' => 'jane.smith@example.com',
                'gender' => 'female',
                'birth' => '1990-05-15',
                'blood' => 'A-',
                'password' => Hash::make('password456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Agrega más pacientes según sea necesario
        ];

        // Insertar los registros en la base de datos
        DB::table('patients')->insert($patients);
    }
}
