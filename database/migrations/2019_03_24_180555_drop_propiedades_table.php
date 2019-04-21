<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPropiedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('propiedades');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->increments('id');
            /*Enums*/
            $table->enum('tipo_propiedad', ['casa', 'apartamento', 'oficina', 'tienda_comercial', 'bodega', 'estacionamiento', 'terreno']);
            $table->enum('negocio', ['arriendo', 'venta']);

            /* Booleans*/
            $table->boolean('amoblado')->nullable();
            $table->boolean('habitacion')->nullable(); // Casa o habitación (?)
            $table->boolean('condominio')->nullable();
            $table->boolean('hall')->nullable();
            $table->boolean('living_comedor')->nullable(); // Living comedor, junto = true
            $table->boolean('estacionamiento')->nullable();
            $table->boolean('estacionamiento_visita')->nullable();
            $table->boolean('oficina_secretaria')->nullable();
            $table->boolean('sala_reunion')->nullable();
            $table->boolean('planta_libre')->nullable(); // planta libre de edificios
            $table->boolean('aire_acondicionado')->nullable();
            $table->boolean('red_computadora')->nullable();
            $table->boolean('alarma_incendio')->nullable();
            $table->boolean('alarma')->nullable();
            $table->boolean('iluminacion')->nullable(); // iluminación de bodegas
            $table->boolean('conexion_trifasica')->nullable();
            $table->boolean('logia')->nullable();
            $table->boolean('terraza')->nullable();
            $table->boolean('bano_visita')->nullable();
            $table->boolean('dormitorio_visita')->nullable();
            $table->boolean('piscina')->nullable();
            $table->boolean('gimnasio')->nullable();
            $table->boolean('sala_evento')->nullable();
            $table->boolean('sauna')->nullable();
            $table->boolean('lavanderia')->nullable();
            $table->boolean('casillero')->nullable();
            $table->boolean('bodega')->nullable();
            $table->boolean('oferta');


            /* Sólo números */
            $table->integer('numero');
            $table->integer('precio');
            $table->integer('ano_construccion')->nullable();
            $table->integer('metros_cuadrados')->nullable();
            $table->integer('metros_cuadrados_construidos')->nullable();
            $table->integer('alto')->nullable();
            $table->integer('ancho')->nullable();
            $table->integer('largo')->nullable();
            $table->integer('avaluo_fiscal')->nullable(); // Avalúo fiscal
            $table->integer('contribuciones')->nullable();
            $table->integer('dormitorio')->nullable();
            $table->integer('suite')->nullable();
            $table->integer('walking_closet')->nullable();
            $table->integer('closet')->nullable();
            $table->integer('bano')->nullable();
            $table->integer('living')->nullable();
            $table->integer('escritorio')->nullable();
            $table->integer('gastos_comunes')->nullable();
            $table->integer('sala_privada')->nullable();
            /* Alfanuméricos */
            $table->string('direccion')->nullable()->unique();
            $table->string('direcciion_referencial')->nullable();
            $table->string('descripcion', 2000);
            $table->string('descripcion_breve', 200);
            $table->string('tipo_oficina')->nullable();
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
            /*Foreign keys*/

            $table->integer('cliente_id')->unsigned()->nullable();
            $table->integer('propietario_id')->unsigned()->nullable();
            $table->integer('edificio_id')->unsigned()->nullable();
            $table->integer('barrio_id')->unsigned()->nullable();


            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('propiedades', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('set null');
            $table->foreign('propietario_id')->references('id')->on('clientes')->onDelete('set null');
            $table->foreign('edificio_id')->references('id')->on('edificios')->onDelete('set null');
            $table->foreign('barrio_id')->references('id')->on('barrios')->onDelete('set null');

        });
    }
}
