<?php


namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear categorías de ejemplo
        $categorias = [
            [
                'nombre' => 'Cardiología',
                'descripcion' => 'Especialidad médica que se ocupa del corazón.',
                'caracteristicas' => 'Consulta, Diagnóstico, Tratamiento',
                'img' => '1723352196.jpg',
                'activa' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Dermatología',
                'descripcion' => 'Especialidad médica que se ocupa de la piel.',
                'caracteristicas' => 'Consulta, Diagnóstico, Tratamiento',
                'img' => '1723352095.jpg',
                'activa' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Cirugia',
                'descripcion' => 'Especialidad médica que se ocupa de la manipulación mecánica de las estructuras anatómicas.',
                'caracteristicas' => 'Consulta, Diagnóstico, Tratamiento',
                'img' => '1723352095.jpg',
                'activa' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Añadir más categorías según sea necesario
        ];

        // Insertar los registros en la base de datos
        DB::transaction(function () use ($categorias) {
            DB::table('categorias')->insert($categorias);
        });
    }
}
