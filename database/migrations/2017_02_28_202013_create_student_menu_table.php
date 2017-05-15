<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_student')->unsigned();
            $table->integer('id_menu')->unsigned();
            $table->integer('point');
            $table->string('note');
            $table->integer('check');
            $table->timestamps();
            $table->foreign('id_student')->references('id')->on('students')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_menu')->references('id')->on('menus')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_menu');
    }
}
