<?php

namespace App;

use App\Companias;
use App\Productores;
use App\Organizadores;
use App\CodigoOrganizador;
use Illuminate\Database\Eloquent\Model;

class CodigoProductor extends Model
{
    protected $guarded = [];

    public function organizadores() {
        return $this->belongsTo(Organizadores::class, 'organizador_id');
    }

    public function productores() {
        return $this->belongsTo(Productores::class, 'productor_id');
     }

    public function companias() {
        return $this->belongsTo(Companias::class, 'compania_id');
    }

    public function codigo_organizador() {
        return $this->belongsTo(CodigoOrganizador::class, 'codigo_organizador_id');
    }
}
