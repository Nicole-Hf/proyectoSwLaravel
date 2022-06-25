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
        Schema::create('autos_pedidos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->double('monto');
            $table->boolean('aceptado');
            $table->unsignedBigInteger('conductor_id');
            $table->unsignedBigInteger('pedido_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('conductor_id')->on('conductores')->references('id')
                ->onDelete('cascade');
            $table->foreign('pedido_id')->on('pedidos')->references('id')
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
        Schema::dropIfExists('autos_pedidos');
    }
};
