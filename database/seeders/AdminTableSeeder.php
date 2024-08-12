<?php


namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class AdminTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

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


        // Insertar los registros en la base de datos
        DB::transaction(function () use ($admin) {
            DB::table('admins')->insert($admin);
        });
    }
}
