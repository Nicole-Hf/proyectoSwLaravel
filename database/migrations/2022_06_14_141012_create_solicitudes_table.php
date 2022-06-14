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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->double('monto')->nullable();
            $table->unsignedBigInteger('auto_id');
            $table->unsignedBigInteger('viaje_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('auto_id')->on('autos')->references('id')
                ->onDelete('cascade');
            $table->foreign('viaje_id')->on('viajes')->references('id')
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
        Schema::dropIfExists('rutas');
    }
};
