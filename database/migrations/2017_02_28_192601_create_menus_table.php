<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cat')->unsigned();
            $table->integer('id_teacher')->unsigned();
            $table->string('cost');
            $table->string('name');
            $table->longtext('description');
            $table->timestamps();
            $table->foreign('id_cat')->references('id')->on('catalogs')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_teacher')->references('id')->on('teachers')
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
        Schema::drop('menus');
    }
}
