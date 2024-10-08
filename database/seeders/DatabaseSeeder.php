<?php

namespace Database\Seeders;


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

        // Llamar a todos los seeders que desees ejecutar
        $this->call([
            CategoriesTableSeeder::class,
            MedicinaTableSeeder::class,
            DoctorsTableSeeder::class,
            ProgramDocTableSeeder::class,
            PatientsTableSeeder::class,
            ExpedienteTableSeeder::class,
            CitasTableSeeder::class,
            ExamsTableSeeder::class,
            RecetasTableSeeder::class,
            LaboratorioTableSeeder::class,
            AdminTableSeeder::class,
        ]);
    }
}
