<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstacionamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estacionamientos', function (Blueprint $table) {
            $table->increments('id');
            /*Enums*/
            $table->enum('negocio', ['arriendo', 'venta']);

            /* Booleans*/
            $table->boolean('oferta');
            $table->boolean('destacado');

            /* Sólo números */
            $table->integer('precio');
            $table->integer('metros_cuadrados')->nullable();
            $table->integer('contribuciones')->nullable();
            $table->string('foto')->nullable();
            $table->string('galeria')->nullable();
            $table->string('ruta')->nullable();


            /*Alfanuméricos*/
            $table->string('direccion')->nullable()->unique();
            $table->string('direccion_referencial')->nullable();
            $table->string('descripcion', 2000);
            $table->string('descripcion_breve', 200);
            $table->string('comentario', 2000)->nullable();

            /*Foreign keys*/

            $table->integer('cliente_id')->unsigned()->nullable();
            $table->integer('propietario_id')->unsigned()->nullable();
            $table->integer('edificio_id')->unsigned()->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('estacionamientos', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('set null');
            $table->foreign('propietario_id')->references('id')->on('clientes')->onDelete('set null');
            $table->foreign('edificio_id')->references('id')->on('edificios')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estacionamientos');
    }
}
