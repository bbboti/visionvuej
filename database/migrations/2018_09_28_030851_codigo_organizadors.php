<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CodigoOrganizadors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigo_organizadors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_organizador');
            $table->string('organizador_id');
            $table->integer('compania_id');
            $table->string('activo');
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
        Schema::dropIfExists('codigo_organizadors');
    }
}
