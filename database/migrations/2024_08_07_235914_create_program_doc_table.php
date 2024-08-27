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
        Schema::create('program_doc', function (Blueprint $table) {
            $table->id();
            $table->text('homeworks')->nullable();
            $table->text('notes')->nullable();

            $table->foreignId('doctor_id')->nullable()->constrained('doctors')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_doc');
    }
};
