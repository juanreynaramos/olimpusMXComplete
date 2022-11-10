<?php

namespace App\Http\Controllers;

use App\Models\Lineas;
use Illuminate\Http\Request;
use App\Models\Aseguradora;
use App\Models\atradius;
use App\Models\Asegurado;
use App\Models\Deudor;
use App\Models\Aig;
use App\Models\Coface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Cesce;
use DB;

class LineasController extends Controller
{
   
    public function index()
    {
        $lineas = Lineas::orderBy('lineas.id','ASC')
            ->join('deudors', 'deudors.id', '=', 'lineas.idDeudor')
            ->join('asegurados', 'asegurados.id', '=', 'lineas.idAsegurado')
            ->join('aseguradoras', 'aseguradoras.id', '=', 'lineas.idAseguradora')
            ->select('lineas.*', 'aseguradoras.razonSocial as arz', 'asegurados.razonSocial as arz2', 'deudors.razonSocial as arz3')->get();
        return view('lineas.index',compact('lineas'));
    }

   
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'id'=>'required',
            'idA'=>'required',
        ]);
        $fecha = e($request->date);
        $id = e($request->id);
        $idA = e($request->idA);
        $contadorNewDeudor = 0;
        $contadorLineas = 0;
        $contadorLineasDuplicadas = 0;
        switch ($id){
            case 3:
                $atradius = atradius::orderBy('id','ASC')->get();
                foreach ($atradius as $atradii) {
                    $decision = "";
                    $linea = new Lineas;
                    $linea->idAseguradora = $id;
                    $linea->idAsegurado = $idA;
                    $linea->fechaSolicitud = $atradii->fechaSolicitud;
                    $linea->importeSolicitado = $atradii->importeSolicitadoLimitesCredito;
                    $linea->importeAsegurado = $atradii->importeTotalDecisionesLimiteCredito;
                    if ($atradii->importeTotalDecisionesLimiteCredito > 0) {
                        $decision = "Otrorgado";
                    }else
                    {
                        $decision = "Pendiente";
                    }
                    $linea->decision = $decision;
                    $linea->fechaEfecto = $atradii->fechaEfecto;
                    $linea->fechaVencimiento = $atradii->fechaExpiracion;
                    $linea->divisaSolicitada = $atradii->codigoMonedaUsuario;
                    $linea->divisaAsegurada = $atradii->codigoMonedaPoliza;
                    $linea->desicion1 = $atradii->condicionLimiteCreditoImporte1;
                    $linea->desicion2 = $atradii->condicionLimiteCreditoImporte2;
                    $linea->desicion3 = $atradii->condicionImporteTotalLimiteCredito;
                    $linea->rating = $atradii->ratingActualCliente;
                    $linea->ratingAnterior = $atradii->ratingAnteriorCliente;
                    $linea->causaId = $atradii->causaId;
                    $linea->mesyear = $fecha."-01";
                    $idDeu = Deudor::select('id')->where('razonSocial',$atradii->nombreCliente)->orWhere('rfc', $atradii->numeroRegistro)->first();
                    $idDeudor = 0;
                    if ($idDeu==Null) {
                        $deudor = new Deudor;
                        $deudor->razonSocial = strtoupper ($atradii->nombreCliente);
                        $deudor->rfc = $atradii->numeroRegistro;
                        $deudor->pais = $atradii->paisCliente;
                        $deudor->ciudad = $atradii->ciudadCliente;
                        $deudor->poblacion = $atradii->areaCliente;
                        $deudor->codigoPais = $atradii->codigoPaisCliente;
                        $deudor->direccion = $atradii->direccionCliente;
                        $deudor->cp = $atradii->cpCliente;
                        $deudor->duns = $atradii->dunyBradstreet;
                        $deudor->giro = $atradii->sectorComercial;
                        $deudor->descripcionGiro = $atradii->descripcionSectorComercial;
                        $deudor->save();
                        $linea->idDeudor = $deudor->id;
                        $contadorNewDeudor++;
                        $linea->save();
                        $contadorLineas++;
                    }else{
                        $linea->idDeudor = $idDeu->id;
                        $count = Lineas::where('idAseguradora',$id)->where('idAsegurado',$idA)->where('idDeudor',$idDeu->id)->where('fechaSolicitud',$atradii->fechaSolicitud)->where('importeSolicitado',$atradii->importeSolicitadoLimitesCredito)->where('importeAsegurado',$atradii->importeTotalDecisionesLimiteCredito)->where('decision',$decision)->where('fechaEfecto',$atradii->fechaEfecto)->where('fechaVencimiento',$atradii->fechaExpiracion)->where('divisaSolicitada',$atradii->codigoMonedaUsuario)->where('divisaAsegurada',$atradii->codigoMonedaPoliza)->where('desicion1',$atradii->condicionLimiteCreditoImporte1)->where('desicion2',$atradii->condicionLimiteCreditoImporte2)->where('desicion3',$atradii->condicionImporteTotalLimiteCredito)->where('rating',$atradii->ratingActualCliente)->where('ratingAnterior',$atradii->ratingAnteriorCliente)->where('causaId',$atradii->causaId)->where('mesyear',$fecha."-01")->first();
                        if ($count == Null){
                            $linea->save();
                            $contadorLineas++;
                        }else
                        {
                            $contadorLineasDuplicadas++;
                        }
                    }
                    $atradiusDelete =  atradius::findOrFail($atradii->id)->delete();
                }
                break;
            case 10:
                $aigs = Aig::orderBy('id','ASC')->get();
                foreach ($aigs as $aig) {
                    $decision = "";
                    $linea = new Lineas;
                    $linea->idAseguradora = $id;
                    $linea->idAsegurado = $idA;
                    $linea->fechaSolicitud = $aig->effectiveDate;
                    $linea->importeSolicitado = $aig->requestedLimitAmount;
                    $linea->importeAsegurado = $aig->approvedLimitAmount;
                    if ($aig->approvedLimitAmount > 0) {
                        $decision = "Otrorgado";
                    }else
                    {
                        $decision = "Pendiente";
                    }
                    $linea->decision = $decision;
                    $linea->fechaEfecto = $aig->effectiveDate;
                    $linea->fechaVencimiento = $aig->fechaExpiracion;
                    $linea->divisaSolicitada = $aig->reqLimCurrency;
                    $linea->divisaAsegurada = $aig->apprLimCurrency;
                    $linea->desicion1 = $aig->specialConditions;
                    $linea->rating = 0;
                    $linea->ratingAnterior = 0;
                    $linea->causaId = $aig->causaId;
                    $linea->mesyear = $fecha."-01";
                    $idDeu = Deudor::select('id')->where('razonSocial',$aig->buyer)->orWhere('duns', $aig->duns)->first();
                    $idDeudor = 0;
                    if ($idDeu==Null) {
                        $deudor = new Deudor;
                        $deudor->razonSocial = strtoupper ($aig->buyer);
                        $deudor->pais = $aig->country;
                        $deudor->duns = $aig->duns;
                        $deudor->save();
                        $linea->idDeudor = $deudor->id;
                        $contadorNewDeudor++;
                        $linea->save();
                        $contadorLineas++;
                    }else{
                        $linea->idDeudor = $idDeu->id;
                        $count = Lineas::where('idAseguradora',$id)->where('idAsegurado',$idA)->where('idDeudor',$idDeu->id)->where('fechaSolicitud',$aig->effectiveDate)->where('importeSolicitado',$aig->requestedLimitAmount)->where('importeAsegurado',$aig->approvedLimitAmount)->where('decision',$decision)->where('fechaEfecto',$aig->effectiveDate)->where('fechaVencimiento',$aig->fechaExpiracion)->where('divisaSolicitada',$aig->reqLimCurrency)->where('divisaAsegurada',$aig->apprLimCurrency)->where('desicion1',$aig->specialConditions)->where('causaId',$aig->causaId)->where('mesyear',$fecha."-01")->first();
                        if ($count == Null){
                            $linea->save();
                            $contadorLineas++;
                        }else
                        {
                            $contadorLineasDuplicadas++;
                        }
                    }
                    $aigsDelete =  Aig::findOrFail($aig->id)->delete();
                }
                break;
            case 2:
                $cofaces = Coface::orderBy('id','ASC')->get();
                foreach ($cofaces as $coface) {
                    $decision = "";
                    $linea = new Lineas;
                    $linea->idAseguradora = $id;
                    $linea->idAsegurado = $idA;
                    $linea->fechaSolicitud = $coface->fechaSolicitud;
                    $linea->importeSolicitado = $coface->importeSolicitado;
                    $linea->importeAsegurado = $coface->cantidadAsegurada;
                    $linea->decision = $coface->estadoDesicion;
                    $linea->fechaEfecto = $coface->fechaEfecto;
                    $linea->fechaVencimiento = $coface->fechaFinalizacion;
                    $linea->divisaSolicitada = $coface->importeDivisaSolicitada;
                    $linea->divisaAsegurada = $coface->monedaAsegurada;
                    $linea->desicion1 = $coface->comentarioDecision;
                    $linea->desicion2 = $coface->desicion1;
                    $linea->desicion3 = $coface->desicion2.";".$coface->desicion3;
                    $linea->rating = $coface->rating;
                    $linea->ratingAnterior = 0;
                    $linea->mesyear = $fecha."-01";
                    $idDeu = Deudor::select('id')->where('razonSocial',$coface->razonSocial)->orWhere('duns', $coface->duns)->orWhere('rfc', $coface->rfc)->first();
                    $idDeudor = 0;
                    if ($idDeu==Null) {
                        $deudor = new Deudor;
                        $deudor->razonSocial = strtoupper ($coface->razonSocial);
                        $deudor->rfc = $coface->rfc;
                        $deudor->pais = $coface->paisCliente;
                        $deudor->cp = $coface->cpCliente;
                        $deudor->ciudad = $coface->ciudadCliente;
                        $deudor->codigoPais = $coface->codigoPaisCliente;
                        $deudor->estadoProvincia = $coface->estadoProvincia;
                        $deudor->duns = $coface->duns;
                        $deudor->save();
                        $linea->idDeudor = $deudor->id;

                        $linea->save();
                        $contadorLineas++;
                        $contadorNewDeudor++;
                    }else{
                        $linea->idDeudor = $idDeu->id;
                        $count = Lineas::where('idAseguradora',$id)->where('idAsegurado',$idA)->where('idDeudor',$idDeu->id)->where('fechaSolicitud',$coface->fechaSolicitud)->where('importeSolicitado',$coface->importeSolicitado)->where('importeAsegurado',$coface->cantidadAsegurada)->where('decision',$coface->estadoDesicion)->where('fechaEfecto',$coface->fechaEfecto)->where('fechaVencimiento',$coface->fechaFinalizacion)->where('divisaSolicitada',$coface->importeDivisaSolicitada)->where('divisaAsegurada',$coface->monedaAsegurada)->where('desicion1',$coface->comentarioDecision)->where('desicion2',$coface->desicion1)->where('desicion3',$coface->desicion2.";".$coface->desicion3)->where('rating',$coface->rating)->where('mesyear',$fecha."-01")->first();
                        if ($count == Null){
                            $linea->save();
                            $contadorLineas++;
                        }else
                        {
                            $contadorLineasDuplicadas++;
                        }
                    }
                    $cofacesDelete =  Coface::findOrFail($coface->id)->delete();
                }
                break;
                case 1:
                $cesces = Cesce::orderBy('id','ASC')->get();
                foreach ($cesces as $cesce) {
                    $decision = "";
                    $linea = new Lineas;
                    $linea->idAseguradora = $id;
                    $linea->idAsegurado = $idA;
                    $linea->fechaSolicitud = $cesce->fechaSolicitud;
                    $linea->importeSolicitado = $cesce->importeSolicitado;
                    $linea->importeAsegurado = $cesce->importeConcedido;
                    $linea->decision = $cesce->situacion;
                    $linea->fechaEfecto = $cesce->fechaEfecto;
                    $linea->fechaVencimiento = $cesce->fechaValidez;
                    $linea->divisaSolicitada = $cesce->divisaSolicitada;
                    $linea->divisaAsegurada = $cesce->divisaAsegurada;
                    $linea->rating = $cesce->reporteComercial;
                    $linea->importeVentasAnual = $cesce->importeVentasAnual;
                    $linea->condicionesPagoConcedido = $cesce->condicionesPagoConcedido;
                    $linea->condicionesPagoSolicitado = $cesce->condicionesPagoSolicitado;
                    $linea->ratingAnterior = 0;
                    $linea->mesyear = $fecha."-01";
                    $idDeu = Deudor::select('id')->where('razonSocial',$cesce->nombreDeudor)->orWhere('rfc', $cesce->rfc)->first();
                    if ($idDeu==Null) {
                        $deudor = new Deudor;
                        $deudor->razonSocial = strtoupper ($cesce->nombreDeudor);
                        $deudor->rfc = $cesce->rfc;
                        $deudor->pais = $cesce->paisDeudor;
                        $deudor->save();
                        $linea->idDeudor = $deudor->id;
                        $contadorNewDeudor++;
                        $linea->save();
                        $contadorLineas++;
                    }else{
                        $linea->idDeudor = $idDeu->id;
                        $count = Lineas::where('idAseguradora',$id)->where('idAsegurado',$idA)->where('idDeudor',$idDeu->id)->where('fechaSolicitud',$cesce->fechaSolicitud)->where('importeSolicitado',$cesce->importeSolicitado)->where('importeAsegurado',$cesce->importeConcedido)->where('decision',$cesce->situacion)->where('fechaEfecto',$cesce->fechaEfecto)->where('fechaVencimiento',$cesce->fechaValidez)->where('divisaSolicitada',$cesce->divisaSolicitada)->where('divisaAsegurada',$cesce->divisaAsegurada)->where('importeVentasAnual',$cesce->importeVentasAnual)->where('condicionesPagoConcedido',$cesce->condicionesPagoConcedido)->where('condicionesPagoSolicitado',$cesce->condicionesPagoSolicitado)->where('rating',$cesce->reporteComercial)->where('mesyear',$fecha."-01")->first();
                        if ($count == Null){
                            $linea->save();
                            $contadorLineas++;
                        }else
                        {
                            $contadorLineasDuplicadas++;
                        }
                    }
                    $cesceDelete =  Cesce::findOrFail($cesce->id)->delete();
                }
                break;
        }
        return view('lineas.store',compact('fecha','contadorNewDeudor','contadorLineas','contadorLineasDuplicadas'));

    }

    public function show($id)
    {
        $lineas = Lineas::where('lineas.id',$id)->join('deudors', 'deudors.id', '=', 'lineas.idDeudor')
            ->join('asegurados', 'asegurados.id', '=', 'lineas.idAsegurado')
            ->join('aseguradoras', 'aseguradoras.id', '=', 'lineas.idAseguradora')
            ->select('lineas.*', 'aseguradoras.razonSocial as arz', 'asegurados.razonSocial as arz2', 'deudors.razonSocial as arz3')->orderBy('lineas.id','ASC')->firstOrFail();
        return view('lineas.show',compact('lineas'));
    }
    
}
