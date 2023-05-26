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
        Schema::create('rankings', function (Blueprint $table) {
            $table->id('ranking_id');
            $table->bigInteger('ranking');
            $table->unsignedBigInteger('result_id')->unique();
            $table->string('nisn');
            $table->string('npsn');
            $table->timestamps();

            $table->foreign('npsn')->references('npsn')->on('schools')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nisn')->references('nisn')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('result_id')->references('result_id')->on('results')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rankings');
    }
};
