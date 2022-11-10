<?php

namespace App\Http\Controllers;

use App\Models\Lineas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Aseguradora;
use App\Models\Asegurado;
use App\Models\Deudor;

class BorrarLineasController extends Controller
{

    public function index()
    {
        $aseguradoras = Aseguradora::orderBy('id','ASC')->get();
        $asegurados = Asegurado::orderBy('razonSocial','ASC')->get();
        return view('BorrarLineas.index',compact('aseguradoras','asegurados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'id'=>'required',
            'idA'=>'required',
        ]);
        $fecha = e($request->date);
        $idA = e($request->idA);
        $id = e($request->id);
        $cont = Lineas::where('mesyear',$fecha.'-01')->where('idAsegurado',$idA)->where('idAseguradora',$id)->count();
        if ($cont<=0) {
            return redirect()->route('borrarLineas.index')->with('info','No existen Lineas para ese asegurado en esta fecha '.$fecha.'' );
        }
        $lineas = Lineas::where('lineas.mesyear',$fecha.'-01')->where('lineas.idAsegurado',$idA)->where('lineas.idAseguradora',$id)->orderBy('lineas.id','ASC')
            ->join('deudors', 'deudors.id', '=', 'lineas.idDeudor')
            ->join('asegurados', 'asegurados.id', '=', 'lineas.idAsegurado')
            ->join('aseguradoras', 'aseguradoras.id', '=', 'lineas.idAseguradora')
            ->select('lineas.*', 'aseguradoras.razonSocial as arz', 'asegurados.razonSocial as arz2', 'deudors.razonSocial as arz3')->get();
        return view('borrarLineas.store',compact('lineas','fecha','idA','id'));
    }

    
    public function borrar(Request $request)
    {
        $fecha = e($request->date);
        $idA = e($request->idA);
        $id = e($request->id);
        $numRows = Lineas::where('lineas.mesyear',$fecha.'-01')->where('lineas.idAsegurado',$idA)->where('lineas.idAseguradora',$id)->count();
        $importeSoli = Lineas::where('lineas.mesyear',$fecha.'-01')->where('lineas.idAsegurado',$idA)->where('lineas.idAseguradora',$id)->sum('importeSolicitado');
        $importeTotalSoli = Lineas::where('lineas.mesyear',$fecha.'-01')->where('lineas.idAsegurado',$idA)->where('lineas.idAseguradora',$id)->sum('importeAsegurado');
        $iva = Lineas::where('lineas.mesyear',$fecha.'-01')->where('lineas.idAseguradora',$id)->where('lineas.idAsegurado',$idA)->sum('importeVentasAnual');
        $asegurado = Asegurado::where('id',$idA)->firstOrFail();
        $aseguradora = Aseguradora::where('id',$id)->firstOrFail();
        $deletedRows = Lineas::where('lineas.mesyear',$fecha.'-01')->where('lineas.idAsegurado',$idA)->where('lineas.idAseguradora',$id)->delete();
        return view('borrarLineas.create',compact('numRows','fecha','idA','importeSoli','importeTotalSoli','iva','asegurado','aseguradora'));
    }

}
