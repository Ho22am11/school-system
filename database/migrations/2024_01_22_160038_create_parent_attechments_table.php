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
        Schema::create('parent_attechments', function (Blueprint $table) {
            $table->id();
            $table->string('name_file');
            $table->unsignedBigInteger('Parent_id');
            $table->foreign('Parent_id')->references('id')->on('my__parents');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_attechments');
    }
};
