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
        $companias = Companias::all();

        return CompaniasResource::collection($companias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if ($request['activo'] == 1) {
            $activo = "SI"; 
        } else {
           $activo = "NO";
        }

        $this->validate($request, [
            'nombre' => 'required',
            'cuit' => 'required',
            'direccion' => 'required',
            'localidad_id' => 'required',
            'telefono_1' => 'required',
            'telefono_aux' => 'required',
            'telefono_siniestros' => 'required',
            'codigo_lr' => 'required',
            'email_emision' => 'required',
            'email_siniestros' => 'required',
            'activo' => 'required',
            'color' => 'color',
            // 'logo' => 'required',
        ]);

        $compania = Companias::create([
            'nombre' => $request->input('nombre'),
            'cuit' => $request->input('cuit'),
            'direccion' => $request->input('direccion'),
            'localidad_id' => $request->input('localidad_id'),
            'telefono_1' => $request->input('telefono_1'),
            'telefono_aux' => $request->input('telefono_aux'),
            'telefono_siniestros' => $request->input('telefono_siniestros'),
            'codigo_lr' => $request->input('codigo_lr'),
            'email_emision' => $request->input('email_emision'),
            'email_siniestros' => $request->input('email_siniestros'),
            'activo' => $activo,
            'color' => $request->input('color'),
            // 'logo' => $request->input('logo'),
        ]);

        return (['message' => 'guardado']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nombre)
    {
        $compania = Companias::where('nombre', $nombre)->get();
        
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
