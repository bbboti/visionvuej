<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Coberturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coberturas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('compania_id');
            $table->string('antiguedad');
            $table->string('todo_riesgo');
            $table->string('franquicia')->nullable();
            $table->string('activa');
            $table->string('ajuste');
            $table->string('detalle');
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
        Schema::dropIfExists('coberturas');
    }
}
