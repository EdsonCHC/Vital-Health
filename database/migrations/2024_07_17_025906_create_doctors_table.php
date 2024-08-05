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
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id'); // Asegúrate de que sea unsignedBigInteger
            $table->string('name');
            $table->string('lastName');
            $table->string('mail');
            $table->string('specialty');
            $table->string('gender');
            $table->date('birth');
            $table->string('password');
            $table->string('doctor_number'); // Nuevo campo para el número de identificación del doctor
            $table->string('role')->default('doctor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};

