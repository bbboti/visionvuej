<?php

namespace App\Http\Controllers;

use App\CodigoOrganizador;
use Illuminate\Http\Request;
use App\Http\Resources\CodigoOrganizador as CodigoOrganizadorsResource;



class CodigoOrganizadorController extends Controller
{
    public function index()
    {
        $codigo_organizadores = CodigoOrganizador::all();

        return CodigoOrganizadorsResource::collection($codigo_organizadores);
    }
}
