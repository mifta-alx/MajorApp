<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('nisn')->unique();
            $table->string('student_name');
            $table->string('gender');
            $table->string('birth_place');
            $table->string('birth_date');
            $table->string('npsn');
            $table->string('email');
            $table->string('phone');
            $table->timestamps();

            $table->foreign('npsn')->references('npsn')->on('schools')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
