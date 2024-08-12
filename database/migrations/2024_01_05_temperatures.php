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
        Schema::create('temperatures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patiend_id');
            $table->decimal('temperature', 5, 2);
            $table->timestamps();
            $table->foreign('patiend_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temperatures');
    }
};
