<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->double('tarifa');
            $table->double('latitud_origen');
            $table->double('latitud_destino');
            $table->double('longitud_origen');
            $table->double('longitud_destino');
            $table->unsignedBigInteger('pasajero_id');
            $table->unsignedBigInteger('pago_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('pasajero_id')->on('pasajeros')->references('id')
                ->onDelete('cascade');
            $table->foreign('pago_id')->on('formas_pagos')->references('id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
