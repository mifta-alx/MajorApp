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
        Schema::create('scores', function (Blueprint $table) {
            $table->id('score_id');
            $table->string('nisn');
            $table->unsignedBigInteger('criteria_id');
            $table->string('score');
            $table->timestamps();
            
            $table->foreign('nisn')->references('nisn')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('criteria_id')->references('criteria_id')->on('criterias')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
};
