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
            $table->string('descripcion');
            $table->string('placa');
            $table->unsignedInteger('interno');
            $table->unsignedBigInteger('chofer_id');
            $table->unsignedBigInteger('linea_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('chofer_id')->on('users')->references('id')
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
