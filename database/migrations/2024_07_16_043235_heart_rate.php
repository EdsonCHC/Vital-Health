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
        Schema::create('heart_rate', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_patient');
            $table->integer('rate');
            $table->timestamps();
            $table->foreign('id_patient')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heart_rate');
    }
};
