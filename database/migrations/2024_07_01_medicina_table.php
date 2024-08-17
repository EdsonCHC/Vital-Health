<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void
    {
        Schema::create('medicinas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();  
            $table->text('descripcion')->nullable(); 
            $table->string('tipo');
            $table->string('dosis'); 
            $table->string('estado')->default('Disponible'); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicinas');
    }
};