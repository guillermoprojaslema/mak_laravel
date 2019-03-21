<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barrios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('comentario');
            $table->integer('comuna_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('barrios', function (Blueprint $table) {
            $table->foreign('comuna_id')->references('id')->on('comunas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barrios');
    }
}
