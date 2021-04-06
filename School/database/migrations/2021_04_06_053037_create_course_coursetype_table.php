<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseCoursetypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_coursetype', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id')->unsigned()->references('id')->on('courses');
            $table->integer('coursetype_id')->unsigned()->references('id')->on('coursetypes');
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
        Schema::dropIfExists('course_coursetype');
    }
}
