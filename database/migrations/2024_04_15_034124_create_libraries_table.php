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
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file_name');
            $table->timestamps();
        });

        Schema::table('libraries' , function (Blueprint $table) {
            $table->foreignId('grade_id')->references('id')->on('grades')->cascadeOnDelete();
            $table->foreignId('classroom_id')->references('id')->on('classrooms')->cascadeOnDelete();
            $table->foreignId('section_id')->references('id')->on('sections')->cascadeOnDelete();
            $table->foreignId('teacher_id')->references('id')->on('teachers')->cascadeOnDelete();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libraries');
    }
};
