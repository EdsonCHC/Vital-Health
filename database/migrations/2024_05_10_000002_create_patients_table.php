<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('lastName', 255);
            $table->string('mail', 255)->unique(); // Agregar índice único
            $table->enum('gender', ['male', 'female', 'other']); // Usar enum para consistencia
            $table->date('birth');
            $table->string('blood', 3); // Considera un tamaño menor si es suficiente
            $table->string('password'); // Asegúrate de almacenar el hash
            $table->string('role', 50)->default('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
}
