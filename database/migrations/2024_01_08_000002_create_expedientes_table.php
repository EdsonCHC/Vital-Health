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
         Schema::create('expedientes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('doctor_id')->nullable()->constrained('doctors')->onDelete('set null');
            // cita
            // examen
            // receta
            // medicina
            $table->foreignId('patient_id')->nullable()->constrained('patients')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
