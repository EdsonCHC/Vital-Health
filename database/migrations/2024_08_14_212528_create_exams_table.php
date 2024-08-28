<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id(); // Define el ID de la tabla
            $table->string('state')->default('1');
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->foreignId('cita_id')->constrained('citas')->onDelete('cascade');
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('set null');
            $table->string('exam_type');
            $table->date('exam_date');
            $table->text('notes')->nullable();
            $table->longText('pdf_file')->charset('binary')->nullable();
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

