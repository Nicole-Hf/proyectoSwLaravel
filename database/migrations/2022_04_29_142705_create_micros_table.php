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
        Schema::create('micros', function (Blueprint $table) {
            $table->id();
            $table->string('placa');
            $table->string('modelo')->nullable();
            $table->string('servicios')->nullable();
            $table->unsignedInteger('interno');
            $table->unsignedInteger('capacidad')->nullable();
            $table->unsignedBigInteger('conductor_id');
            $table->unsignedBigInteger('linea_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('conductor_id')->on('conductores')->references('id')
                ->onDelete('cascade');
            $table->foreign('linea_id')->on('lineas')->references('id')
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
        Schema::dropIfExists('micros');
    }
};
