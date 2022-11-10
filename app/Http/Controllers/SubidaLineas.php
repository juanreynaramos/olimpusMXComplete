<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Aseguradora;
use App\Models\Asegurado;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Facades\ValidationException;
use App\Imports\AtradiusImport;
use App\Models\atradius;
use App\Models\Aig;
use App\Imports\AigImport;
use App\Models\Coface;
use App\Imports\CofaceImport;
use App\Models\Cesce;
use App\Imports\CesceImport;
use Illuminate\Support\Facades\Storage;
use DB;

class SubidaLineas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aseguradoras = Aseguradora::orderBy('id','ASC')->get();
        $asegurados = Asegurado::orderBy('razonSocial','ASC')->get();
        return view('subidaLineas.index',compact('aseguradoras','asegurados'));
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
            'id'=>'required',
            'idA'=>'required',
            'file'=>'required'
        ]);
        $fecha = e($request->date);
        $id = e($request->id);
        $idA = e($request->idA);
        if($request->hasFile('file')){

            $nameAse = Aseguradora::where('id',$id)->firstOrFail();
            $exito = "Se han subido con exito ";

            switch ($id) {
                case 10:
                    $import = new AigImport;
                    $import->import(request()->file('file'));
                    if ($import->failures()->isNotEmpty()) {
                        Aig::truncate();
                        return back()->withFailures($import->failures());
                    }
                    $numRows = Aig::count();
                    $importeSoli = Aig::sum('requestedLimitAmount');
                    $importeTotalSoli = Aig::sum('approvedLimitAmount');
                    $codigoMoneda = DB::table('aigs')->select(DB::raw('DISTINCT reqLimCurrency as cmu, apprLimCurrency as mu'))->where('reqLimCurrency','!=','')->where('apprLimCurrency','!=','')->groupBy('reqLimCurrency','apprLimCurrency')->get();
                    $codigoMonedaUsuario = $codigoMoneda[0]->cmu;
                    $monedaUsuario = $codigoMoneda[0]->mu;
                    return view('subidaLineas.create',compact('numRows','fecha','nameAse','id','idA','importeSoli','codigoMonedaUsuario','importeTotalSoli','monedaUsuario'));
                    break;
                case 3:
                    $import = new AtradiusImport;
                    $import->import(request()->file('file'));
                    if ($import->failures()->isNotEmpty()) {
                        atradius::truncate();
                        return back()->withFailures($import->failures());
                    }
                    $numRows = atradius::count();
                    $importeSoli = atradius::sum('importeSolicitadoLimitesCredito');
                    $importeTotalSoli = atradius::sum('importeTotalDecisionesLimiteCredito');
                    $codigoMoneda = DB::table('atradii')->select(DB::raw('DISTINCT codigoMonedaUsuario as cmu, monedaUsuario as mu'))->groupBy('codigoMonedaUsuario','monedaUsuario')->get();
                    $codigoMonedaUsuario = $codigoMoneda[0]->cmu;
                    $monedaUsuario = $codigoMoneda[0]->mu;
                    return view('subidaLineas.create',compact('numRows','fecha','nameAse','id','idA','importeSoli','codigoMonedaUsuario','importeTotalSoli','monedaUsuario'));
                    break;
                case 2:
                    $import = new CofaceImport;
                    $import->import(request()->file('file'));
                    if ($import->failures()->isNotEmpty()) {
                        Coface::truncate();
                        return back()->withFailures($import->failures());
                    }
                    $numRows = Coface::count();
                    $importeSoli = Coface::sum('importeSolicitado');
                    $importeTotalSoli = Coface::sum('cantidadAsegurada');
                    $codigoMoneda = DB::table('cofaces')->select(DB::raw('DISTINCT importeDivisaSolicitada as cmu, monedaAsegurada as mu'))->where('importeDivisaSolicitada','!=','')->where('monedaAsegurada','!=','')->groupBy('importeDivisaSolicitada','monedaAsegurada')->get();
                    $codigoMonedaUsuario = $codigoMoneda[0]->cmu;
                    $monedaUsuario = $codigoMoneda[0]->mu;
                    return view('subidaLineas.create',compact('numRows','fecha','nameAse','id','idA','importeSoli','codigoMonedaUsuario','importeTotalSoli','monedaUsuario'));
                    break;
                case 1:
                    $carpeta = "";
                    $file = $request->file('file');
                    $nombreArchivo = $file->getClientOriginalName();
                    Storage::disk('local')->put('csv/'.$nombreArchivo,  \File::get($file));
                    $public_path = public_path().'/storage/csv/';
                    $url = $public_path.$nombreArchivo;
                    if (Storage::exists('csv/'.$nombreArchivo))
                    {
                        $import = new CesceImport;
                        $import->import($url);
                        if ($import->failures()->isNotEmpty()) {
                            Cesce::truncate();
                            return back()->withFailures($import->failures());
                        }
                        $numRows = Cesce::count();
                        $importeSoli = Cesce::sum('importeSolicitado');
                        $importeTotalSoli = Cesce::sum('importeConcedido');
                        $codigoMoneda = DB::table('cesces')->select(DB::raw('DISTINCT divisa as cmu'))->where('divisa','!=','')->groupBy('divisa')->get();
                        $codigoMonedaUsuario = $monedaUsuario = $codigoMoneda[0]->cmu;
                        Storage::delete('csv/'.$nombreArchivo);
                        return view('subidaLineas.create',compact('numRows','fecha','nameAse','id','idA','importeSoli','codigoMonedaUsuario','importeTotalSoli','monedaUsuario'));
                     }             
                    break;
                default:
                    return back()->with('info','Aseguradora no habilitada, verifica la subida del archivo.');
                    break;
            }
            
            $exito = "Se han subido con exito ";
            return view('subidaLineas.create',compact('numRows','fecha','nameAse','id'));
        }else
        {   
            return back()->with('info','No se subío con éxito el archivo, verifica que este correcto.');
        }
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
