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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('state'); // Puedes considerar usar un enum si hay estados predefinidos
            $table->date('date');
            $table->string('description', 1000); // Ajusta la longitud según tus necesidades
            $table->timestamp('published_at')->index(); // Timestamp con índice
            $table->timestamps(); // Marcas de tiempo para created_at y updated_at
            $table->unsignedBigInteger('id_patient');
            $table->foreign('id_patient')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
