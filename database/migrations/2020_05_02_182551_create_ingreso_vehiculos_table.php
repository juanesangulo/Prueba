<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_vehiculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->DateTime('fecha_ingreso');
            $table->UnsignedInteger('vehiculo_id');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('cascade');
            $table->integer('estado');
            $table->UnsignedInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingreso_vehiculos');
    }
}
