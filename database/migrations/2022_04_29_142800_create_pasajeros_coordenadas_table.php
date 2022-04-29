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
        Schema::create('pasajeros_coordenadas', function (Blueprint $table) {
            $table->id();
            $table->boolean('esFavorito');
            $table->unsignedBigInteger('pasajero_id');
            $table->unsignedBigInteger('coordenada_id');
            $table->unsignedBigInteger('linea_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('pasajero_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('coordenada_id')->references('id')->on('coordenadas')
                ->onDelete('cascade');
            $table->foreign('linea_id')->references('id')->on('lineas')
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
        Schema::dropIfExists('pasajeros_coordenadas');
    }
};
