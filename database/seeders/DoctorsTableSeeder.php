<?php


namespace Database\Seeders;


use App\Models\citas;
use App\Models\Usuario;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class DoctorsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Crear doctors de ejemplo
        $doctors = [
            [
                'name' => 'Victor',
                'lastName' => 'Alexander',
                'description' => 'El Dr. Victor es un experto en [especialidad], conocido por su habilidad técnica y trato excepcional con los pacientes. Su enfoque profesional y empático garantiza una atención de alta calidad y una experiencia positiva para cada paciente.',
                'number' => '5555-5555',
                'age' => 55,
                'gender' => 'male',
                'mail' => 'doc_victoralex@gmail.com',
                'password' => Hash::make('doctor123'),
                'role' => 'doctor',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Alejandro',
                'lastName' => 'Alvarenga',
                'description' => 'El Dr. Alejandro es un experto en [especialidad], conocido por su habilidad técnica y trato excepcional con los pacientes. Su enfoque profesional y empático garantiza una atención de alta calidad y una experiencia positiva para cada paciente.',
                'number' => '5555-5555',
                'age' => 50,
                'gender' => 'male',
                'mail' => 'doc_alealvarenga@gmail.com',
                'password' => Hash::make('doctor456'),
                'role' => 'doctor',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Geovanni',
                'lastName' => 'Jacinto',
                'description' => 'El Dr. Geovanni es un experto en [especialidad], conocido por su habilidad técnica y trato excepcional con los pacientes. Su enfoque profesional y empático garantiza una atención de alta calidad y una experiencia positiva para cada paciente.',
                'number' => '5555-5555',
                'age' => 50,
                'gender' => 'male',
                'mail' => 'doc_geo@gmail.com',
                'password' => Hash::make('doctor789'),
                'role' => 'doctor',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];


        // Insertar los registros en la base de datos
        DB::transaction(function () use ($doctors) {
            DB::table('doctors')->insert($doctors);
        });
    }
}
