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
            $table->id();
            $table->string('state')->default('1'); 
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->string('exam_type');
            $table->boolean('results')->default(true);
            $table->time('exam_hour');
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
