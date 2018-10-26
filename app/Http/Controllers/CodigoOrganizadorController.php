<?php

namespace App\Http\Controllers;

use App\CodigoOrganizador;
use Illuminate\Http\Request;
use App\Http\Resources\CodigoOrganizador as CodigoOrganizadorsResource;



class CodigoOrganizadorController extends Controller
{
    public function index()
    {
        $codigo_organizadores = CodigoOrganizador::with('organizadores')->get();

        return CodigoOrganizadorsResource::collection($codigo_organizadores);
    }

    public function show($id)
    {
        $codigo_organizadores = CodigoOrganizador::findOrFail($id);

        return new CodigoOrganizadorsResource($codigo_organizadores);
    }

    public function store(Request $request)
    {        
        $this->validate($request, [

        ]);

        $codigo_organizador = CodigoOrganizador::create([
            'codigo_organizador' => $request->input('codigo_organizador'),
            'organizador_id' => $request->input('organizador_id'),
            'compania_id' => $request->input('compania_id'),
            'activo' => $request->input('activo'),
        ]);

        return (['message' => 'guardado']);

    }

    public function update(Request $request, $id)
    {
        $codigo_organizador = CodigoOrganizador::find($id);
        $codigo_organizador->update([
            'codigo_organizador' => $request->input('codigo_organizador'),
            'organizador_id' => $request->input('organizador_id'),
            'compania_id' => $request->input('compania_id'),
            'activo' => $request->input('activo'),
        ]);
    }

    public function destroy($id)
    {
        $codigo_organizador = CodigoOrganizador::find($id);
        
        $codigo_organizador->delete();

        return ['message'=> 'Eliminado'];
    }
}
