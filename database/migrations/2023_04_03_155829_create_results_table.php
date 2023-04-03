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
        Schema::create('results', function (Blueprint $table) {
            $table->id('result_id');
            $table->string('nisn');
            $table->unsignedBigInteger('score_id');
            $table->string('saw_result');
            $table->string('recomendation_result');
            $table->timestamps();

            $table->foreign('nisn')->references('nisn')->on('students')->onDelete('cascade');
            $table->foreign('score_id')->references('score_id')->on('scores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
};
