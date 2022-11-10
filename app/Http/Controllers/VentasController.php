<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Aseguradora;
use App\Models\Asegurado;
use App\Models\Deudor;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Facades\ValidationException;
use Illuminate\Support\Facades\Storage;
use App\Models\VentaTemp;
use App\Imports\VentasImport;
use DB;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        VentaTemp::truncate();
        $asegurados = Asegurado::orderBy('razonSocial','ASC')->get();
        return view('ventas.index',compact('asegurados'));
    }


    public function create()
    {
        $ventas = Ventas::orderBy('ventas.id','ASC')
            ->join('deudors', 'deudors.id', '=', 'ventas.idDeudor')
            ->join('asegurados', 'asegurados.id', '=', 'ventas.idAsegurado')
            ->select('ventas.*',  'asegurados.razonSocial as arz2', 'deudors.razonSocial as arz3')->get();
        return view('ventas.venta',compact('ventas'));
    }

    public function valida(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'idA'=>'required'
        ]);
        $fecha = e($request->date);
        $idA = e($request->idA);        
        $contadorNewDeudor = 0;
        $contadorLineas = 0;
        $contadorLineasDuplicadas = 0;
        $ventasTemps = VentaTemp::orderBy('id','ASC')->get();
        foreach ($ventasTemps as $ventasTemp) {
            $venta = new Ventas;
            $venta->idAsegurado = $idA;
            $venta->factura= $ventasTemp->factura;
            $venta->importe= $ventasTemp->importe;
            $venta->iva= $ventasTemp->iva;
            $venta->importeTotal = $ventasTemp->importeTotal;
            $venta->monedaFactura = $ventasTemp->monedaFactura;
            $venta->fechaFactura = $ventasTemp->fechaFactura;
            $venta->fechaVencimiento = $ventasTemp->fechaVencimiento;
            $venta->plazoCredito = $ventasTemp->plazoCredito;
            $venta->fechaPago = $ventasTemp->fechaPago;
            $venta->destino = $ventasTemp->destino;
            $venta->tipoFactura = $ventasTemp->tipoFactura;
            $venta->estatusCliente = $ventasTemp->estatusCliente;
            $venta->comentarios = $ventasTemp->comentarios;
            $venta->mesyear = $fecha."-01";
            $conta = 0;
            $cadena = "";
            $rfc = $ventasTemp->identificador;
            $razonSocial = $ventasTemp->razonSocial;
            if($razonSocial != ""  || !(is_null($razonSocial))) {
                $cadena = ' REPLACE(REPLACE( razonSocial, ",", ""),".","")=REPLACE(REPLACE("'.$razonSocial.'", ",", ""),".","")';
                $conta ++;
            }
            if ($rfc != "" || !(is_null($rfc))) {
                if ($conta>0) {
                    $cadena .= " or ";
                }
                $cadena .= " (rfc='".$rfc."' or duns= '".$rfc."') ";
            }
            $deudor = Deudor::select('id')->whereRaw($cadena)->first();
            if ($deudor==Null) {
                $deudor = new Deudor;
                $deudor->razonSocial = strtoupper($razonSocial);
                $deudor->rfc = $rfc;
                $deudor->pais = $ventasTemp->pais;
                $deudor->save();
                $venta->idDeudor = $deudor->id;
                $contadorNewDeudor++;
                $venta->save();
                $contadorLineas++;
            }else
            {
                $venta->idDeudor = $deudor->id;
                $count = Ventas::where('idAsegurado',$idA)->where('idDeudor',$deudor->id)->where('factura',$ventasTemp->factura)->where('importe',$ventasTemp->importe)->where('iva',$ventasTemp->iva)->where('importeTotal',$ventasTemp->importeTotal)->where('monedaFactura',$ventasTemp->monedaFactura)->where('fechaFactura',$ventasTemp->fechaFactura)->where('fechaVencimiento',$ventasTemp->fechaVencimiento)->where('plazoCredito',$ventasTemp->plazoCredito)->where('fechaPago',$ventasTemp->fechaPago)->where('destino',$ventasTemp->destino)->where('tipoFactura',$ventasTemp->tipoFactura)->where('estatusCliente',$ventasTemp->estatusCliente)->where('comentarios',$ventasTemp->comentarios)->where('mesyear',$fecha."-01")->first();
                if ($count == Null) {
                    $venta->save();
                    $contadorLineas++;
                }else
                {
                    $contadorLineasDuplicadas++;
                }
            }
            $ventaDelete =  VentaTemp::findOrFail($ventasTemp->id)->delete();
        }
        return view('ventas.store',compact('fecha','contadorNewDeudor','contadorLineas','contadorLineasDuplicadas'));
        
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'idA'=>'required',
            'file'=>'required'
        ]);
        $fecha = e($request->date);
        $idA = e($request->idA);
        if($request->hasFile('file')){
            $nameAse = Asegurado::where('id',$idA)->firstOrFail();            
            $import = new VentasImport;
            $import->import(request()->file('file'));
            if ($import->failures()->isNotEmpty()) {
                VentaTemp::truncate();
                return back()->withFailures($import->failures());
            }
            $numRows = VentaTemp::count();
            $importeSoli = VentaTemp::sum('importe');
            $iva = VentaTemp::sum('iva');
            $importeTotalSoli = VentaTemp::sum('importeTotal');
            $ventasTemp = VentaTemp::distinct('razonSocial')->orderBy('id','ASC')->get();
            $arrayDeudor =[];
            foreach ($ventasTemp as $value){
                $conta = 0;
                $cadena = "";
                $rfc = $value->identificador;
                $razonSocial = $value->razonSocial;
                $razonS = false;
                $iden = false;
                if($razonSocial != ""  || !(is_null($razonSocial))) {
                    $cadena = ' REPLACE(REPLACE( razonSocial, ",", ""),".","")=REPLACE(REPLACE("'.$value->razonSocial.'", ",", ""),".","")';                    
                    $razonS = array_search($razonSocial, array_column($arrayDeudor, 'razonSocial'));
                    $conta ++;
                }
                if ($rfc != "" || !(is_null($rfc))) {
                    if ($conta>0) {
                        $cadena .= " or ";
                    }
                    $cadena .= " (rfc='".$rfc."' or duns= '".$rfc."') ";                    
                    $iden = array_search($rfc, array_column($arrayDeudor, 'identificador'));
                }
                $deudor = Deudor::select('id')->whereRaw($cadena)->first();
                if ($deudor==Null) {
                    if (false === $razonS && false === $iden) {
                        $arrayDeudor[]=$value;
                    }
                }
            }
            $newDeudors = count($arrayDeudor);
            return view('ventas.create',compact('numRows','fecha','nameAse','iva','idA','importeSoli','importeTotalSoli','arrayDeudor','newDeudors','cadena'));
        }else
        {
            $asegurados = Asegurado::orderBy('razonSocial','ASC')->get();
            return view('ventas.index',compact('asegurados'));
        }
    }

    
    public function show( $id )
    {
        $ventas = Ventas::where('ventas.id',$id)->orderBy('ventas.id','ASC')
            ->join('deudors', 'deudors.id', '=', 'ventas.idDeudor')
            ->join('asegurados', 'asegurados.id', '=', 'ventas.idAsegurado')
            ->select('ventas.*',  'asegurados.razonSocial as arz2', 'deudors.razonSocial as arz3')->firstOrFail();
        return view('ventas.show',compact('ventas'));
    }

    
    public function edit(Request $request)
    {
        //
    }
    

    public function update(Request $request, Ventas $ventas)
    {
        //
    }

    
    public function destroy(Ventas $ventas)
    {
        //
    }
}
