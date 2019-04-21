<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficinas', function (Blueprint $table) {
            $table->increments('id');
            /*Enums*/
            $table->enum('negocio', ['arriendo', 'venta']);

            /* Booleans*/
            $table->boolean('mostrar')->nullable();
            $table->boolean('amoblado')->nullable();
            $table->boolean('habitacion')->nullable(); // Casa o habitación (?)
            $table->boolean('oficina_secretaria')->nullable();
            $table->boolean('sala_reunion')->nullable();
            $table->boolean('aire_acondicionado')->nullable();
            $table->boolean('red_computadora')->nullable();
            $table->boolean('alarma_incendio')->nullable();
            $table->boolean('alarma')->nullable();
            $table->boolean('oferta');


            /* Sólo números */
            $table->integer('numero');
            $table->integer('precio');
            $table->integer('metros_cuadrados_construidos')->nullable();
            $table->integer('contribuciones')->nullable();
            $table->integer('bano')->nullable();
            $table->integer('living')->nullable();
            $table->integer('gastos_comunes')->nullable();
            $table->integer('sala_privada')->nullable();
            /* Alfanuméricos */
            $table->string('descripcion', 2000);

            $table->string('tipo_oficina')->nullable();
            $table->string('orientacion')->nullable();
            $table->string('tipo_cocina')->nullable();
            $table->string('tipo_ventana')->nullable();
            $table->string('tipo_agua_caliente')->nullable();
            $table->string('tipo_piso')->nullable();
            $table->string('calefaccion')->nullable();
            $table->string('comentario', 2000)->nullable();
            $table->string('foto')->nullable();
            $table->string('galeria')->nullable();
            $table->string('ruta')->nullable();

            /*Foreign keys*/

            $table->integer('cliente_id')->unsigned()->nullable();
            $table->integer('propietario_id')->unsigned()->nullable();
            $table->integer('edificio_id')->unsigned()->nullable();


            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('oficinas', function (Blueprint $table) {
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
        Schema::dropIfExists('oficinas');
    }
}
