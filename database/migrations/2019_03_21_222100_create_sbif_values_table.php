<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSbifValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sbif_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('dolar');
            $table->float('euro');
            $table->float('uf');
            $table->float('ipc');
            $table->integer('utm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sbif_values');
    }
}
