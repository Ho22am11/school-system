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
        Schema::create('recept_students', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->decimal('Debit')->nullable();
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->timestamps();

            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recept_students');
    }
};
