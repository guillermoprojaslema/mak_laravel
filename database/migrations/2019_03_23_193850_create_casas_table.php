<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casas', function (Blueprint $table) {
            $table->increments('id');
            /*Enums*/
            $table->enum('negocio', ['arriendo', 'venta']);

            /* Booleans*/
            $table->boolean('amoblado')->nullable();
            $table->boolean('habitacion')->nullable(); // Casa o habitación (?)
            $table->boolean('condominio')->nullable();
            $table->boolean('hall')->nullable();
            $table->boolean('living_comedor')->nullable(); // Living comedor, junto = true
            $table->boolean('estacionamiento')->nullable();
            $table->boolean('aire_acondicionado')->nullable();
            $table->boolean('alarma_incendio')->nullable();
            $table->boolean('alarma')->nullable();
            $table->boolean('logia')->nullable();
            $table->boolean('terraza')->nullable();
            $table->boolean('pieza_planchado')->nullable();
            $table->boolean('bano_visita')->nullable();
            $table->boolean('dormitorio_visita')->nullable();
            $table->boolean('piscina')->nullable();
            $table->boolean('bodega')->nullable();
            $table->boolean('oferta');
            $table->boolean('destacado');

            /* Sólo números */
            $table->integer('precio');
            $table->integer('ano_construccion')->nullable();
            $table->integer('metros_cuadrados')->nullable();
            $table->integer('metros_cuadrados_construidos')->nullable();
            $table->integer('avaluo_fiscal')->nullable(); // Avalúo fiscal
            $table->integer('contribuciones')->nullable();
            $table->integer('dormitorio')->nullable();
            $table->integer('suite')->nullable();
            $table->integer('walking_closet')->nullable();
            $table->integer('closet')->nullable();
            $table->integer('bano')->nullable();
            $table->integer('living')->nullable();
            $table->integer('escritorio')->nullable();
            $table->integer('sala_estar')->nullable();
            $table->integer('gastos_comunes')->nullable();
            /* Alfanuméricos */
            $table->string('rol')->nullable()->unique();
            $table->string('direccion')->nullable()->unique();
            $table->string('direccion_referencial')->nullable();
            $table->string('descripcion', 2000);
            $table->string('descripcion_breve', 200);
            $table->string('tipo_casa')->nullable();
            $table->string('orientacion')->nullable();
            $table->string('tipo_cocina')->nullable();
            $table->string('tipo_ventana')->nullable();
            $table->string('tipo_agua_caliente')->nullable();
            $table->string('tipo_piso')->nullable();
            $table->string('calefaccion')->nullable();
            $table->string('comentario', 2000)->nullable();
            $table->string('foto')->nullable();
            $table->string('galeria')->nullable();
            $table->string('ruta')->default('casas');

            /*Foreign keys*/

            $table->integer('cliente_id')->unsigned()->nullable();
            $table->integer('propietario_id')->unsigned()->nullable();
            $table->integer('barrio_id')->unsigned()->nullable();


            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('casas', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('set null');
            $table->foreign('propietario_id')->references('id')->on('clientes')->onDelete('set null');
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
        Schema::dropIfExists('casas');
    }
}
