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
        ];

        // Crear admin de ejemplo
        $admin = [
            [
                'name' => 'Admin',
                'mail' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        // Crear doctors de ejemplo
        $doctors = [
            [
                'name' => 'Victor',
                'lastName' => 'Alexander',
                'mail' => 'doc_victoralex@gmail.com',
                'specialty' => 'cardiology',
                'gender' => 'male',
                'password' => Hash::make('doctor123'),
                'doctor_number' => '5555-5555',
                'role' => 'Medical',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        // Insertar los registros en la base de datos
        DB::transaction(function () use ($patients, $admin, $doctors) {
            DB::table('patients')->insert($patients);
            DB::table('admins')->insert($admin);
            DB::table('doctors')->insert($doctors);
        });
    }
}
