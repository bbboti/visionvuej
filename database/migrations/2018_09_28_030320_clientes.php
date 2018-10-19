<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_persona');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('razon_social')->nullable();
            $table->string('tipo_doc');
            $table->integer('nro_dni');
            $table->string('sexo');
            $table->string('nacimiento');
            $table->string('condicion_fiscal');
            $table->string('cuit');
            $table->integer('registro');
            $table->string('vencimiento_registro');
            $table->string('email');
            $table->string('email_alt');
            $table->string('direccion');
            $table->integer('direccion_nro');
            $table->string('direccion_piso');
            $table->string('direccion_depto');
            $table->integer('localidad_id');
            $table->string('barrio_cerrado');
            $table->string('lote');
            $table->integer('celular');
            $table->integer('telefono_1');
            $table->integer('telefono_2');
            $table->string('img_registro');
            $table->string('observaciones_1');
            $table->string('observaciones_2');
            $table->integer('productor_id');
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
        Schema::dropIfExists('clientes');
    }
}
