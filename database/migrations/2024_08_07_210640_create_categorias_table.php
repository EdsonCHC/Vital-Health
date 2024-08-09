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
        Schema::create('Categorias', function (Blueprint $table) {
            $table->id(); 
            $table->string('nombre'); 
            $table->text('descripción')->nullable(); 
            $table->text('características')->nullable(); 
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Categorias');
    }
};
