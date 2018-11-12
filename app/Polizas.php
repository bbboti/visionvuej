<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Polizas extends Model
{
    protected $guarded = [];
    
    
    public function companias() {
        return $this->belongsTo(Companias::class, 'compania_id');
    }
    

    public function clientes() {
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }

    public function codigoProductor() {
        return $this->belongsTo(Codigoproductor::class, 'codigo_productor_id');
    }

    public function tipoRiesgo() {
        return $this->belongsTo(TipoRiesgo::class, 'tipo_riesgo_id');
    }
}
