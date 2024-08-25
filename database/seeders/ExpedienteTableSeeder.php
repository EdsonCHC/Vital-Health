<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ExpedienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // No funicona pero no me da cabeza ahorita
        $expediente = [
            [
                'state' => '0',
                'patient_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'state' => '0',
                'patient_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'state' => '1',
                'patient_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        // Insertar los registros en la base de datos
        DB::transaction(function () use ($expediente) {
            DB::table('expedientes')->insert($expediente);
        });
    }
}
