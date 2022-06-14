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
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->double('tarifa');
            $table->double('latO');
            $table->double('longO');
            $table->double('latD');
            $table->double('longD');
            $table->unsignedBigInteger('pasajero_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('pasajero_id')->on('pasajeros')->references('id')
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
        Schema::dropIfExists('viajes');
    }
};
