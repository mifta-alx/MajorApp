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
            $table->unsignedBigInteger('alternative_id');
            $table->float('scores');
            $table->unsignedBigInteger('criteria_id');
            $table->timestamps();
            
            $table->foreign('nisn')->references('nisn')->on('students')->onDelete('cascade');
            $table->foreign('alternative_id')->references('alternative_id')->on('alternatives')->onDelete('cascade');
            $table->foreign('criteria_id')->references('criteria_id')->on('criterias')->onDelete('cascade');
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
