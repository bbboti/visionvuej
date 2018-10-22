<?php

namespace App\Http\Controllers;

use App\CodigoProductor;
use Illuminate\Http\Request;
use App\Http\Resources\CodigoProductor as CodigoProductorsResource;



class CodigoProductorController extends Controller
{
    public function index()
    {
        $codigo_productores = CodigoProductor::all();

        return CodigoProductorsResource::collection($codigo_productores);
    }
}
