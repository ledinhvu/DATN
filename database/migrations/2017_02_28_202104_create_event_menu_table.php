<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_menu', function (Blueprint $table) {
            $table->integer('id_event')->unsigned();
            $table->integer('id_menu')->unsigned();
            $table->foreign('id_event')->references('id')->on('events')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_menu')->references('id')->on('menus')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['id_event', 'id_menu']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_menu');
    }
}
