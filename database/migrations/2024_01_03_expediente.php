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
        Schema::create('expediente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('address');
            $table->string('phone_number');
            $table->string('civil_status');
            $table->string('occupation');
            $table->string('family_history');
            $table->string('previous_illnesses');
            $table->string('Allergies');
            $table->string('previous_surgeries');
            $table->string('previous_medical_treatments');
            $table->string('personal_bad_habits');
            $table->unsignedBigInteger('id_patient');
            $table->foreign('id_patient')->references('id')->on('patients')->onDelete('cascade');
            $table->unsignedBigInteger('id_Diagnose');
            $table->foreign('id_diagnose')->references('id')->on('diagnose')->onDelete('cascade');
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
