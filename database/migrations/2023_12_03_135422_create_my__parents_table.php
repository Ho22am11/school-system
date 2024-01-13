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
        Schema::create('my__parents', function (Blueprint $table) {
            $table->id();
            $table->string('Email')->unique();
            $table->string('Password');

            //Fatherinformation
            $table->string('Name_Father');
            $table->string('National_ID_Father');
            $table->string('Phone_Father');
            $table->string('Job_Father');
            $table->unsignedBigInteger('Religion_Father_id');
            $table->foreign('Religion_Father_id')->references('id')->on('religions');
            $table->unsignedBigInteger('nationality_Father_id');
            $table->foreign('nationality_Father_id')->references('id')->on('nationalities');
            $table->string('Address_Father');
            $table->unsignedBigInteger('status_father_id');
            $table->foreign('status_father_id')->references('id')->on('statuses');

            //Mother information
            $table->string('Name_Mother');
            $table->string('National_ID_Mother');
            $table->string('Phone_Mother');
            $table->string('Job_Mother');
            $table->string('Address_Mother');
            $table->unsignedBigInteger('nationality_Mother_id');
            $table->foreign('nationality_Mother_id')->references('id')->on('nationalities');
            $table->unsignedBigInteger('Religion_Mother_id');
            $table->foreign('Religion_Mother_id')->references('id')->on('religions');
            $table->unsignedBigInteger('status_Mother_id');
            $table->foreign('status_Mother_id')->references('id')->on('statuses');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my__parents');
    }
};
