<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_menu', function (Blueprint $table) {
            $table->integer('id_lesson')->unsigned();
            $table->integer('id_menu')->unsigned();
            $table->foreign('id_lesson')->references('id')->on('lessons')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_menu')->references('id')->on('menus')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['id_lesson', 'id_menu']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_menu');
    }
}
