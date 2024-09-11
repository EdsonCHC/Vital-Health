<?php


namespace Database\Seeders;


use App\Models\citas;
use App\Models\Usuario;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class PatientsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear pacientes de ejemplo
        $patients = [
            [
                'name' => 'John',
                'lastName' => 'Doe',
                'mail' => 'john@example.com',
                'address' => 'Apopa',
                'gender' => 'male',
                'birth' => '1989-12-22',
                'blood' => 'O+',
                'email_verification_token' => null,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('pass123'),
                'img' => 'blob',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Jane',
                'lastName' => 'Smith',
                'mail' => 'jane@example.com',
                'address' => 'Apopa',
                'gender' => 'female',
                'birth' => '1990-05-15',
                'blood' => 'A-',
                'email_verification_token' => null,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('pass456'),
                'img' => 'blob',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Francisco',
                'lastName' => 'Soto',
                'mail' => 'fran@example.com',
                'address' => 'Apopa',
                'gender' => 'male',
                'birth' => '2000-05-15',
                'blood' => 'B-',
                'email_verification_token' => null,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('pass789'),
                'img' => 'blob',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];


        // Insertar los registros en la base de datos
        DB::transaction(function () use ($patients) {
            DB::table('patients')->insert($patients);
        });
    }
}
