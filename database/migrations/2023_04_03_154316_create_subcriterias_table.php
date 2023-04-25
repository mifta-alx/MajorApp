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
        Schema::create('subcriterias', function (Blueprint $table) {
            $table->id('subcriteria_id');
            $table->unsignedBigInteger('criteria_id');
            $table->bigInteger('subcriteria_start');
            $table->bigInteger('subcriteria_end');
            $table->bigInteger('subcriteria_score');
            $table->timestamps();

            // $table->foreign('criteria_id')->references('criteria_id')->on('criterias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcriterias');
    }
};
