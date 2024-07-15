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
        Schema::create('expediente', function (Blueprint $table){
            $table->id();
            $table->string("full_name");
            $table->date("date_of_birth");
            $table->string("gender");
            $table->string("address");
            $table->string("phone_number");
            $table->string("civil_status");
            $table->string("occupation");
            $table->string("family_history");
            $table->string("previous_illnesses");
            $table->string("Allergies");
            $table->string("previous_surgeries.");
            $table->string("previous_medical_treatments.");
            $table->string("personal_bad_habits");
            $table->string("current_symptoms");
            $table->string("physical_signs");
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('usuarios');
            $table->unsignedBigInteger("id_Diagnose");
            $table->foreign('id_Diagnsoe')->references('id')->on('Diagnoses');     
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
