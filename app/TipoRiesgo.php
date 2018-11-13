<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoRiesgo extends Model
{
    public function ramo() {
        return $this->belongsTo(Ramo::class, 'ramo_id');
    }

    public function polizas(){
        return $this->hasMany(Polizas::class, 'tipo_riesgo_id', 'id');
    }
}