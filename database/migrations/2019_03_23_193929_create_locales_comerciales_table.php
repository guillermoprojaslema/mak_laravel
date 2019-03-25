<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalesComercialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locales_comerciales', function (Blueprint $table) {
            $table->increments('id');
            /*Enums*/
            $table->enum('negocio', ['arriendo', 'venta']);

            /* Booleans*/
            $table->boolean('alarma')->nullable();
            $table->boolean('alarma_incendio')->nullable();
            $table->boolean('iluminacion')->nullable(); // iluminación de bodegas
            $table->boolean('conexion_trifasica')->nullable();
            $table->boolean('oferta');
            $table->boolean('destacado');

            /* Sólo números */
            $table->integer('numero');
            $table->integer('precio');
            $table->integer('ano_construccion')->nullable();
            $table->integer('metros_cuadrados')->nullable();
            $table->integer('metros_cuadrados_construidos')->nullable();
            $table->integer('alto')->nullable();
            $table->integer('ancho')->nullable();
            $table->integer('largo')->nullable();
            $table->integer('contribuciones')->nullable();
            $table->integer('gastos_comunes')->nullable();
            $table->integer('sala_privada')->nullable();

            /* Alfanuméricos */
            $table->string('direccion')->nullable()->unique();
            $table->string('direccion_referencial')->nullable();
            $table->string('descripcion', 2000);
            $table->string('descripcion_breve', 200);
            $table->string('calefaccion')->nullable();
            $table->string('tipo_piso')->nullable();
            $table->string('tipo_agua_caliente')->nullable();
            $table->string('comentario', 2000)->nullable();
            $table->string('foto')->nullable();
            $table->string('galeria')->nullable();
            $table->string('ruta')->nullable();

            /*Foreign keys*/
            $table->integer('cliente_id')->unsigned()->nullable();
            $table->integer('propietario_id')->unsigned()->nullable();
            $table->integer('barrio_id')->unsigned()->nullable();


            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('locales_comerciales', function (Blueprint $table) {
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
        Schema::dropIfExists('locales_comerciales');
    }
}
