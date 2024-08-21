<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('receta_medicina', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receta_id')->constrained('recetas')->onDelete('cascade');
            $table->foreignId('medicina_id')->constrained('medicinas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('receta_medicina');
    }
};
