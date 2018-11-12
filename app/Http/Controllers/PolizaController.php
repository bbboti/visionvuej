<?php

namespace App\Http\Controllers;

use App\Polizas;
use Illuminate\Http\Request;
use App\Http\Resources\Poliza as PolizasResource;


class PolizaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polizas = Polizas::all();

        return PolizasResource::collection($polizas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $polizas = Polizas::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        
        $poliza = Polizas::create([
            'cliente_id' => $request->input('cliente_id'),
            'companias_id' => $request->input('companias_id'),
            'codigo_productor_id' => $request->input('codigo_productor_id'),
            'tipo_riesgo_id' => $request->input('tipo_riesgo_id'),
            'numero' => $request->input('numero'),
            'estado_poliza_id' => $request->input('estado_poliza_id'),
            'renueva_numero' => $request->input('renueva_numero'),
            'tipo_vigencia' => $request->input('tipo_vigencia'),
            'vigencia_dias' => $request->input('vigencia_dias'),
            'vigencia_desde' => $request->input('vigencia_desde'),
            'vigencia_hasta' => $request->input('vigencia_hasta'),
            'fecha_solicitud' => $request->input('fecha_solicitud'),
            'fecha_emision' => $request->input('fecha_emision'),
            'fecha_recepcion' => $request->input('fecha_recepcion'),
            'fecha_entrega_correo' => $request->input('fecha_entrega_correo'),
            'fecha_entrega_original' => $request->input('fecha_entrega_original'),
            'fecha_entrega_email' => $request->input('fecha_entrega_email'),
            'premio' => $request->input('premio'),
            'prima' => $request->input('prima'),
            'plan_pago' => $request->input('plan_pago'),
            'cantidad_cuotas' => $request->input('cantidad_cuotas'),
            'medio_pago' => $request->input('medio_pago'),
            'detalle_medio_pago' => $request->input('detalle_medio_pago'),
            'comision' => $request->input('comision'),
            'descuento' => $request->input('descuento'),
            'archivada' => $request->input('archivada'),
        ]);

        return (['message' => 'guardado']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($numero)
    {
        $poliza = Polizas::where('numero', $numero)->get();

        return new PolizasResource($poliza);
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
        $poliza = Polizas::find($id);
        $poliza->update([
            'cliente_id' => $request->input('cliente_id'),
            'companias_id' => $request->input('companias_id'),
            'codigo_productor_id' => $request->input('codigo_productor_id'),
            'tipo_riesgo_id' => $request->input('tipo_riesgo_id'),
            'numero' => $request->input('numero'),
            'estado_poliza_id' => $request->input('estado_poliza_id'),
            'renueva_numero' => $request->input('renueva_numero'),
            'tipo_vigencia' => $request->input('tipo_vigencia'),
            'vigencia_dias' => $request->input('vigencia_dias'),
            'vigencia_desde' => $request->input('vigencia_desde'),
            'vigencia_hasta' => $request->input('vigencia_hasta'),
            'fecha_solicitud' => $request->input('fecha_solicitud'),
            'fecha_emision' => $request->input('fecha_emision'),
            'fecha_recepcion' => $request->input('fecha_recepcion'),
            'fecha_entrega_correo' => $request->input('fecha_entrega_correo'),
            'fecha_entrega_original' => $request->input('fecha_entrega_original'),
            'fecha_entrega_email' => $request->input('fecha_entrega_email'),
            'premio' => $request->input('premio'),
            'prima' => $request->input('prima'),
            'plan_pago' => $request->input('plan_pago'),
            'cantidad_cuotas' => $request->input('cantidad_cuotas'),
            'medio_pago' => $request->input('medio_pago'),
            'detalle_medio_pago' => $request->input('detalle_medio_pago'),
            'comision' => $request->input('comision'),
            'descuento' => $request->input('descuento'),
            'archivada' => $request->input('archivada'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poliza = Polizas::find($id);

        $poliza->delete();

        return ['message'=>'Eliminado'];
    }
}
