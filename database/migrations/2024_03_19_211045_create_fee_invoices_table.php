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
        Schema::create('fee_invoices', function (Blueprint $table) {
            $table->id();
            $table->date('invoices_date');
            $table->decimal('amount');
            $table->timestamps();

        });

        Schema::table('fee_invoices', function (Blueprint $table){

            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('Grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreignId('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreignId('fee_id')->references('id')->on('fees')->onDelete('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_invoices');
    }
};
