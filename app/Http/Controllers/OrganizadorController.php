<?php

namespace App\Http\Controllers;

use App\Organizadores;
use Illuminate\Http\Request;
use App\Http\Resources\Organizador as OrganizadoresResource;


class OrganizadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizadores = Organizadores::all();

        return OrganizadoresResource::collection($organizadores);
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
        if ($request['activo'] == 1) {
            $activo = "SI"; 
        } else {
           $activo = "NO";
        }

        $this->validate($request, [
            'nombre' => 'required',
            'apellido' => 'required',
            'cuit' => 'required',
            'matricula' => 'required',
            'email' => 'required',
            'telefono_1' => 'required',
            'telefono_2' => 'required',
            'activo' => 'required',
        ]);

        $organizador = Organizadores::create([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'cuit' => $request->input('cuit'),
            'matricula' => $request->input('matricula'),
            'email' => $request->input('email'),
            'telefono_1' => $request->input('telefono_1'),
            'telefono_2' => $request->input('telefono_2'),
            'activo' => $activo,
        ]);

        return (['message' => 'guardado']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
