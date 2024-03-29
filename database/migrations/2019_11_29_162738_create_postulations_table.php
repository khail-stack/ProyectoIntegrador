<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulations', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('answer');
            $table->timestamps();
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('offer_id');

            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('offer_id')->references('id')->on('offers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postulations');
    }
}
