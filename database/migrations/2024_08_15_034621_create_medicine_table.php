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
        Schema::create('medicine', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('batch_number');
            $table->integer('quantity');
            $table->date('expiration_date');
            $table->text('description')->nullable();
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade');
            // $table->foreignId('laboratorist_id')->constrained('laboratorists')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine');
    }
};
