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
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lastName');
            $table->longText('description');
            $table->string('number');
            $table->integer('age');
            $table->string('gender');
            $table->string('mail');
            $table->string('homeworks')->nullable();
            $table->string('notes')->nullable();
            $table->string('password');
            $table->string('role')->default('doctor');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreignId('notes_id')->constrained('notes')->cascadeOnDelete();
            $table->foreignId('homeworks_id')->constrained('homeworks')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
