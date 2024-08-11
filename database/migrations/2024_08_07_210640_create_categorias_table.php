<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique(); 
            $table->text('descripcion')->nullable(); 
            $table->text('caracteristicas')->nullable(); 
            $table->string('img')->nullable();
            $table->boolean('activa')->default(true);
            $table->timestamps();
            
            // Opcional: Agregar índice para 'nombre'
            // $table->index('nombre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
