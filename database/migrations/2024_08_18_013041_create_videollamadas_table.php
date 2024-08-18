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
        Schema::create('videollamadas', function (Blueprint $table) {
            $table->id();
            $table->string('room_name');
            $table->date('date');
            $table->time('hour');
            $table->string('enlace')->nullable();

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
        Schema::dropIfExists('videollamadas');
    }
};
