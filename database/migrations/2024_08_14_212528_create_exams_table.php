<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id(); // Define el ID de la tabla
            $table->string('state')->default('1');
            $table->foreignId('patient_id')
                ->constrained('patients')
                ->onDelete('cascade'); // Si se elimina un paciente, se eliminan los exámenes asociados
            $table->foreignId('cita_id')
                ->constrained('citas')
                ->onDelete('cascade'); // Si se elimina una cita, se eliminan los exámenes asociados
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->string('exam_type');
            $table->date('exam_date');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
