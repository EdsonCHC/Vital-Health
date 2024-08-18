<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expediente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nombre');
            $table->date('nacimiento');
            $table->string('gender');
            $table->string('mail');
            $table->string('status_civil');
            $table->string('occupation');
            $table->string('Allergies');
            
            // Foreing keys
            $table->foreignId('examen_id')->constrained('exams');
            $table->foreignId('cita_id')->constrained('citas');
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->foreignId('patient_id')->constrained('patients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expediente');
    }
};
