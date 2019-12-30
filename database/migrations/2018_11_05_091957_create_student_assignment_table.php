<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_assignment', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('student_id')->unsigned();
          $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
          $table->integer('assignment_id')->unsigned();
          $table->foreign('assignment_id')->references('id')->on('assignment')->onDelete('cascade');
          $table->integer('subject_id')->unsigned();
          $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
          $table->integer('level_id')->unsigned();
          $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
          $table->string('file');
          $table->string('title')->nullable();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_assignment');
    }
}
