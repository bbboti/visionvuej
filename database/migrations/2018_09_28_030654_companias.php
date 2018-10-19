<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Companias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('cuit');
            $table->string('direccion');
            $table->string('localidad_id');
            $table->string('telefono_1');
            $table->string('telefono_aux');
            $table->string('telefono_siniestros');
            $table->string('email_emision');
            $table->string('email_siniestros');
            $table->integer('codigo_lr');
            $table->string('logo')->nullable();
            $table->string('activo');
            $table->string('color')->nullable();
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
        Schema::dropIfExists('companias');
    }
}
