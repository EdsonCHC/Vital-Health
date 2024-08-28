<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProgramDocTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programDoc = [
            [
                'homeworks' => 'Revisar examenes',
                'notes' => 'avisar',
                'doctor_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'homeworks' => 'Revisar examenes',
                'notes' => 'avisar',
                'doctor_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'homeworks' => 'Revisar examenes',
                'notes' => 'avisar',
                'doctor_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insertar los registros en la base de datos
        DB::transaction(function () use ($programDoc) {
            DB::table('program_doc')->insert($programDoc);
        });
    }
}
