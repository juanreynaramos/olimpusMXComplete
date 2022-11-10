<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Aseguradora;
use App\Models\Asegurado;
use App\Models\Deudor;

class BorrarVentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asegurados = Asegurado::orderBy('razonSocial','ASC')->get();
        return view('borrarVentas.index',compact('asegurados'));
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
        $request->validate([
            'date'=>'required',
            'idA'=>'required',
        ]);
        
        $fecha = e($request->date);
        $idA = e($request->idA);
        $cont = Ventas::where('ventas.mesyear',$fecha.'-01')->where('ventas.idAsegurado',$idA)->count();
        if ($cont<=0) {
            return redirect()->route('borrarVentas.index')->with('info','No existen ventas para ese asegurado en esta fecha '.$fecha.'' );
        }
        $ventas = Ventas::where('ventas.mesyear',$fecha.'-01')->where('ventas.idAsegurado',$idA)
            ->orderBy('ventas.id','ASC')->join('deudors', 'deudors.id', '=', 'ventas.idDeudor')
            ->join('asegurados', 'asegurados.id', '=', 'ventas.idAsegurado')
            ->select('ventas.*',  'asegurados.razonSocial as arz2', 'deudors.razonSocial as arz3')->get();
        return view('borrarVentas.store',compact('ventas','fecha','idA'));

    }

    /**
     * Display the specified resource.
     *  Contraseña: jvE57s_9
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

    public function borrar(Request $request)
    {
        $fecha = e($request->date);
        $idA = e($request->idA);
        $numRows = Ventas::where('ventas.mesyear',$fecha.'-01')->where('ventas.idAsegurado',$idA)->count();
        $importeSoli = Ventas::where('ventas.mesyear',$fecha.'-01')->where('ventas.idAsegurado',$idA)->sum('importe');
        $importeTotalSoli = Ventas::where('ventas.mesyear',$fecha.'-01')->where('ventas.idAsegurado',$idA)->sum('importeTotal');
        $iva = Ventas::where('ventas.mesyear',$fecha.'-01')->where('ventas.idAsegurado',$idA)->sum('iva');
        $asegurado = Asegurado::where('id',$idA)->firstOrFail();
        $deletedRows = Ventas::where('ventas.mesyear',$fecha.'-01')->where('ventas.idAsegurado',$idA)->delete();
        return view('borrarVentas.create',compact('numRows','fecha','idA','importeSoli','importeTotalSoli','iva','asegurado'));
    }
}
