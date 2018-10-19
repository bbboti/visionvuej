<?php

namespace App\Http\Controllers;

use App\Companias;
use Illuminate\Http\Request;
use App\Http\Resources\Compania as CompaniasResource;


class CompaniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companias = Companias::all();

        return CompaniasResource::collection($companias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nombre)
    {
        $compania = " SELECT * FROM Companias WHERE 'nombre'=$nombre ";
        

        // $compania = Companias::whereHas('nombre', function ($query) use ($nombre){
        //     $query->where('nombre', 'like', $nombre);
        // })->get();

        // $compania=Companias::find($id);

        return new CompaniasResource($compania);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companias = Companias::find($id);
        $productores = Productores::All();
        $localidades = Localidades::All();
        $organizadores = Organizadores::All();

        $coberturas = Coberturas::whereHas('companias', function ($query) use ($id) {
            $query->where('compania_id', 'like', $id);
        })->get();

        $codigo_organizadores = CodigoOrganizador::whereHas('companias', function ($query) use ($id) {
            $query->where('compania_id', 'like', $id);
        })->get();

        $codigo_productores = Codigoproductor::whereHas('companias', function ($query) use ($id) {
            $query->where('compania_id', 'like', $id);
        })->get();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
