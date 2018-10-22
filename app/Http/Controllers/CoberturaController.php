<?php

namespace App\Http\Controllers;

use App\Coberturas;
use Illuminate\Http\Request;
use App\Http\Resources\Cobertura as CoberturasResource;



class CoberturaController extends Controller
{
    public function index()
    {
        $coberturas = Coberturas::all();

        return CoberturasResource::collection($coberturas);
    }
}
