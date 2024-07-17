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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lastName');
            $table->string('mail');
            $table->string('gender');
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
