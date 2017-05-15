<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_menu', function (Blueprint $table) {
            $table->integer('id_menu')->unsigned();
            $table->integer('id_time')->unsigned();
            $table->foreign('id_menu')->references('id')->on('menus')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_time')->references('id')->on('times')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['id_menu', 'id_time']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_menu');
    }
}
