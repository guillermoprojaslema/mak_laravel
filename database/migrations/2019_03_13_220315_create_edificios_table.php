<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdificiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edificios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('direccion_numero');
            $table->string('direccion_referencial');
            $table->string('telefono')->nullable();
            $table->integer('pisos')->nullable();
            $table->integer('estacionamiento_visita')->nullable();
            $table->boolean('planta_libre')->nullable();
            $table->integer('ano_construccion')->nullable();
            $table->string('comentario')->nullable();
            $table->string('foto')->nullable();
            $table->string('galeria')->nullable();
            $table->integer('barrio_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

        });

        Schema::table('edificios', function (Blueprint $table) {
            $table->foreign('barrio_id')->references('id')->on('barrios')->onDelete('set null');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edificios');
    }
}
