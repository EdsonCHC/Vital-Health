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
        Schema::create('citas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('state')->default('1'); 
            $table->date('date');
            $table->time('hour');
            $table->string('description', 1000);
            $table->string('modo');
            $table->string('enlace')->nullable(); 
            $table->timestamp('published_at')->nullable()->index();
            $table->timestamps();
            $table->unsignedBigInteger('id_patient');
            $table->unsignedBigInteger('id_doctor')->nullable();

            $table->foreign('id_patient')->references('id')->on('patients')->onDelete('cascade'); 
            $table->foreign('id_doctor')->references('id')->on('doctors')->onDelete('set null');
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
