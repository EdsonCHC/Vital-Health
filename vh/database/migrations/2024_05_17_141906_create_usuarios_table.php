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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastName');
            $table->longText('mail');
            $table->string('gender');
            $table->date('birth');
            $table->string('blood');
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('state');
            $table->date('date');
            $table->string("description");
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('usuarios');          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('citas');
    }
};
