<?php

namespace App\Http\Controllers;
use App\Models\Poliza;
use App\Models\Aseguradora;
use App\Models\Asegurado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PolizasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polizas = Poliza::orderBy('polizas.id','ASC')
            ->join('aseguradoras', 'aseguradoras.id', '=', 'polizas.idAseguradora')
            ->join('asegurados', 'asegurados.id', '=', 'polizas.idAsegurado')
            ->select('polizas.*', 'aseguradoras.razonSocial as arz', 'asegurados.razonSocial as arz2')->get();
        return view('polizas.index',compact('polizas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $aseguradoras = Aseguradora::orderBy('razonSocial','ASC')->pluck('razonSocial','id');
        $asegurados = Asegurado::orderBy('razonSocial','ASC')->pluck('razonSocial','id');
        return view('polizas.create',compact('aseguradoras','asegurados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'poliza' => 'required|unique:polizas|max:100',
            'inicioVigencia' => 'required',
            'finVigencia' => 'required'
        ]);
        $poliza = new Poliza;
        $poliza->idAseguradora = e($request->idAseguradora);
        $poliza->idAsegurado = e($request->idAsegurado);
        $poliza->poliza = e($request->poliza);
        $poliza->inicioVigencia = e($request->inicioVigencia); 
        $poliza->finVigencia = e($request->finVigencia);
        $poliza->tipoPrograma = e($request->tipoPrograma);
        if ($request->pronosticoVentas!='') {
            $poliza->pronosticoVentas = e($request->pronosticoVentas);
        }
        if ($request->tasa!='') {
            $poliza->tasa = e($request->tasa);
        }
        if ($request->primaTotal!='') {
            $poliza->primaTotal = e($request->primaTotal);
        }
        if ($request->primaMinima!='') {
            $poliza->primaMinima = e($request->primaMinima);
        }
        if ($request->pagoTrimestral!='') {
            $poliza->pagoTrimestral = e($request->pagoTrimestral);
        }

        
        
        $poliza->monedaPoliza = e($request->monedaPoliza);
        $poliza->paisesCubiertos = e($request->paisesCubiertos);
        if (e($request->paisesCubiertos)=='SI') {
            $poliza->paisesCubiertosTodos = e($request->paisesCubiertosTodos);
        }
        if ($request->porcentajeCoberturaParticular!='') {
            $poliza->porcentajeCoberturaParticular = e($request->porcentajeCoberturaParticular);
        }
        if ($request->creditoIndividual!='') {
            $poliza->creditoIndividual = e($request->creditoIndividual);
        }
        if ($request->deducibleAnual!='') {
            $poliza->deducibleAnual = e($request->deducibleAnual);
        }
        if ($request->responsabilidadMaxima!='') {
            $poliza->responsabilidadMaxima = e($request->responsabilidadMaxima);
        }
        if ($request->montoMaximoAcumulado!='') {
            $poliza->montoMaximoAcumulado = e($request->montoMaximoAcumulado);
        }        
        $importe = e($request->importe);
        $porcentajeCoberturaDiscrecional = e($request->porcentajeCoberturaDiscrecional);
        if ($importe == '') {
            $importe = 0;
        }
        if ($porcentajeCoberturaDiscrecional == '') {
            $porcentajeCoberturaDiscrecional = 0;
        }
        $poliza->importe = $importe;
        $poliza->porcentajeCoberturaDiscrecional = $porcentajeCoberturaDiscrecional;        
        if ($request->indemnizaciones != '') {
            $poliza->indemnizaciones = e($request->indemnizaciones);
        }        
        $poliza->montoMaximoIndemnizaciones = $importe*$porcentajeCoberturaDiscrecional*.01;
        $poliza->requisitoLimiteCredito = e($request->requisitoLimiteCredito);
        if ($request->montoCoberturaPrimerEmbarque != '') {
            $poliza->montoCoberturaPrimerEmbarque = e($request->montoCoberturaPrimerEmbarque);
        }
        if ($request->porcentajeCoberturaPrimerEmbarque != '') {
            $poliza->porcentajeCoberturaPrimerEmbarque = e($request->porcentajeCoberturaPrimerEmbarque);
        }
        if ($request->numMaximoIndemnizacionesPrimerEmbarque != '') {
            $poliza->numMaximoIndemnizacionesPrimerEmbarque = e($request->numMaximoIndemnizacionesPrimerEmbarque);
        }
        if ($request->periodoDeclaracionSiniestro != '') {
            $poliza->periodoDeclaracionSiniestro = e($request->periodoDeclaracionSiniestro);
        }
        if ($request->plazoCredito != '') {
            $poliza->plazoCredito = e($request->plazoCredito);
        }
        if ($request->plazoCreditoEspecialPoliza != '') {
            $poliza->plazoCreditoEspecialPoliza = e($request->plazoCreditoEspecialPoliza);
        }
        $poliza->plazoCreditoEspecialDeudor = e($request->plazoCreditoEspecialDeudor);
        if ($request->periodoCobroVencido != '') {
            $poliza->periodoCobroVencido = e($request->periodoCobroVencido);
        }
        if ($request->plazoMEP != '') {
            $poliza->plazoMEP = e($request->plazoMEP);
        }
        if ($request->periodoEsperaMora != '') {
            $poliza->periodoEsperaMora = e($request->periodoEsperaMora);
        }
        $poliza->suspensionAutomaticaCobertura = e($request->suspensionAutomaticaCobertura);
        if ($request->periodoEsperaMora != '') {
            $poliza->periodoEsperaMora = e($request->periodoEsperaMora);
        }
        if ($request->limiteMaximoProrrogas != '') {
            $poliza->limiteMaximoProrrogas = e($request->limiteMaximoProrrogas);
        }
        if ($request->retorno != '') {
            $poliza->retorno = e($request->retorno);
        }
        if ($request->porcentaje != '') {
            $poliza->porcentaje = e($request->porcentaje);
        }
        if ($request->siniestralidad0 != '') {
            $poliza->siniestralidad0 = e($request->siniestralidad0);
        }
        if ($request->siniestralidad10 != '') {
            $poliza->siniestralidad10 = e($request->siniestralidad10);
        }
        if ($request->bonoSiniestralidad15al18 != '') {
            $poliza->bonoSiniestralidad15al18 = e($request->bonoSiniestralidad15al18);
        }
        if ($request->bonoSiniestralidad15 != '') {
            $poliza->bonoSiniestralidad15 = e($request->bonoSiniestralidad15);
        }
        if ($request->siniestralidad30 != '') {
            $poliza->siniestralidad30 = e($request->siniestralidad30);
        }
        if ($request->siniestralidad70 != '') {
            $poliza->siniestralidad70 = e($request->siniestralidad70);
        }
        if ($request->siniestralidad100 != '') {
            $poliza->siniestralidad100 = e($request->siniestralidad100);
        }
        if ($request->estudioDeudoresDomestico != '') {
            $poliza->estudioDeudoresDomestico = e($request->estudioDeudoresDomestico);
        }
        if ($request->estudioDeudoresExportacion != '') {
            $poliza->estudioDeudoresExportacion = e($request->estudioDeudoresExportacion);
        }
        if ($request->revisionClasificaciones != '') {
            $poliza->revisionClasificaciones = e($request->revisionClasificaciones);
        }
        if ($request->mantenimientoClasificaciones != '') {
            $poliza->mantenimientoClasificaciones = e($request->mantenimientoClasificaciones);
        }
        if ($request->gastosAperturaDomestico != '') {
            $poliza->gastosAperturaDomestico = e($request->gastosAperturaDomestico);
        }
        if ($request->gastosAperturaExportacion != '') {
            $poliza->gastosAperturaExportacion = e($request->gastosAperturaExportacion);
        }
        if ($request->costosProrroga != '') {
            $poliza->costosProrroga = e($request->costosProrroga);
        }
        
        $poliza->sistemaLinea = e($request->sistemaLinea);
        $poliza->endososEspeciales = e($request->endososEspeciales);
        $poliza->notas = e($request->notas);
        $poliza->save();

        return redirect()->route('polizas.index')->with('info','Agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poliza = Poliza::where('polizas.id',$id)->orderBy('polizas.id','ASC')
            ->join('aseguradoras', 'aseguradoras.id', '=', 'polizas.idAseguradora')
            ->join('asegurados', 'asegurados.id', '=', 'polizas.idAsegurado')
            ->select('polizas.*', 'aseguradoras.razonSocial as arz', 'asegurados.razonSocial as arz2')->firstOrFail();
        return view('polizas.show',compact('poliza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $polizas = Poliza::where('id',$id)->firstOrFail();
        $aseguradoras = Aseguradora::orderBy('razonSocial','ASC')->pluck('razonSocial','id');
        $asegurados = Asegurado::orderBy('razonSocial','ASC')->pluck('razonSocial','id');
        return view('polizas.edit',compact('polizas','aseguradoras','asegurados'));
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
        $this->validate($request,[
            'inicioVigencia' => 'required',
            'finVigencia' => 'required'
        ]);
        $poliza = Poliza::findOrFail($id);
        $poliza->inicioVigencia = e($request->inicioVigencia); 
        $poliza->finVigencia = e($request->finVigencia);
        $poliza->tipoPrograma = e($request->tipoPrograma);
        if ($request->pronosticoVentas!='') {
            $poliza->pronosticoVentas = e($request->pronosticoVentas);
        }
        if ($request->tasa!='') {
            $poliza->tasa = e($request->tasa);
        }
        if ($request->primaTotal!='') {
            $poliza->primaTotal = e($request->primaTotal);
        }
        if ($request->primaMinima!='') {
            $poliza->primaMinima = e($request->primaMinima);
        }
        if ($request->pagoTrimestral!='') {
            $poliza->pagoTrimestral = e($request->pagoTrimestral);
        }
        $poliza->monedaPoliza = e($request->monedaPoliza);
        $poliza->paisesCubiertos = e($request->paisesCubiertos);
        if (e($request->paisesCubiertos)=='SI') {
            $poliza->paisesCubiertosTodos = e($request->paisesCubiertosTodos);
        }
        if ($request->porcentajeCoberturaParticular!='') {
            $poliza->porcentajeCoberturaParticular = e($request->porcentajeCoberturaParticular);
        }
        if ($request->creditoIndividual!='') {
            $poliza->creditoIndividual = e($request->creditoIndividual);
        }
        if ($request->deducibleAnual!='') {
            $poliza->deducibleAnual = e($request->deducibleAnual);
        }
        if ($request->responsabilidadMaxima!='') {
            $poliza->responsabilidadMaxima = e($request->responsabilidadMaxima);
        }
        if ($request->montoMaximoAcumulado!='') {
            $poliza->montoMaximoAcumulado = e($request->montoMaximoAcumulado);
        }        
        $importe = e($request->importe);
        $porcentajeCoberturaDiscrecional = e($request->porcentajeCoberturaDiscrecional);
        if ($importe == '') {
            $importe = 0;
        }
        if ($porcentajeCoberturaDiscrecional == '') {
            $porcentajeCoberturaDiscrecional = 0;
        }
        $poliza->importe = $importe;
        $poliza->porcentajeCoberturaDiscrecional = $porcentajeCoberturaDiscrecional;        
        if ($request->indemnizaciones != '') {
            $poliza->indemnizaciones = e($request->indemnizaciones);
        }        
        $poliza->montoMaximoIndemnizaciones = $importe*$porcentajeCoberturaDiscrecional*.01;
        $poliza->requisitoLimiteCredito = e($request->requisitoLimiteCredito);
        if ($request->montoCoberturaPrimerEmbarque != '') {
            $poliza->montoCoberturaPrimerEmbarque = e($request->montoCoberturaPrimerEmbarque);
        }
        if ($request->porcentajeCoberturaPrimerEmbarque != '') {
            $poliza->porcentajeCoberturaPrimerEmbarque = e($request->porcentajeCoberturaPrimerEmbarque);
        }
        if ($request->numMaximoIndemnizacionesPrimerEmbarque != '') {
            $poliza->numMaximoIndemnizacionesPrimerEmbarque = e($request->numMaximoIndemnizacionesPrimerEmbarque);
        }
        if ($request->periodoDeclaracionSiniestro != '') {
            $poliza->periodoDeclaracionSiniestro = e($request->periodoDeclaracionSiniestro);
        }
        if ($request->plazoCredito != '') {
            $poliza->plazoCredito = e($request->plazoCredito);
        }
        if ($request->plazoCreditoEspecialPoliza != '') {
            $poliza->plazoCreditoEspecialPoliza = e($request->plazoCreditoEspecialPoliza);
        }
        $poliza->plazoCreditoEspecialDeudor = e($request->plazoCreditoEspecialDeudor);
        if ($request->periodoCobroVencido != '') {
            $poliza->periodoCobroVencido = e($request->periodoCobroVencido);
        }
        if ($request->plazoMEP != '') {
            $poliza->plazoMEP = e($request->plazoMEP);
        }
        if ($request->periodoEsperaMora != '') {
            $poliza->periodoEsperaMora = e($request->periodoEsperaMora);
        }
        $poliza->suspensionAutomaticaCobertura = e($request->suspensionAutomaticaCobertura);
        if ($request->periodoEsperaMora != '') {
            $poliza->periodoEsperaMora = e($request->periodoEsperaMora);
        }
        if ($request->limiteMaximoProrrogas != '') {
            $poliza->limiteMaximoProrrogas = e($request->limiteMaximoProrrogas);
        }
        if ($request->retorno != '') {
            $poliza->retorno = e($request->retorno);
        }
        if ($request->porcentaje != '') {
            $poliza->porcentaje = e($request->porcentaje);
        }
        if ($request->siniestralidad0 != '') {
            $poliza->siniestralidad0 = e($request->siniestralidad0);
        }
        if ($request->siniestralidad10 != '') {
            $poliza->siniestralidad10 = e($request->siniestralidad10);
        }
        if ($request->bonoSiniestralidad15al18 != '') {
            $poliza->bonoSiniestralidad15al18 = e($request->bonoSiniestralidad15al18);
        }
        if ($request->bonoSiniestralidad15 != '') {
            $poliza->bonoSiniestralidad15 = e($request->bonoSiniestralidad15);
        }
        if ($request->siniestralidad30 != '') {
            $poliza->siniestralidad30 = e($request->siniestralidad30);
        }
        if ($request->siniestralidad70 != '') {
            $poliza->siniestralidad70 = e($request->siniestralidad70);
        }
        if ($request->siniestralidad100 != '') {
            $poliza->siniestralidad100 = e($request->siniestralidad100);
        }
        if ($request->estudioDeudoresDomestico != '') {
            $poliza->estudioDeudoresDomestico = e($request->estudioDeudoresDomestico);
        }
        if ($request->estudioDeudoresExportacion != '') {
            $poliza->estudioDeudoresExportacion = e($request->estudioDeudoresExportacion);
        }
        if ($request->revisionClasificaciones != '') {
            $poliza->revisionClasificaciones = e($request->revisionClasificaciones);
        }
        if ($request->mantenimientoClasificaciones != '') {
            $poliza->mantenimientoClasificaciones = e($request->mantenimientoClasificaciones);
        }
        if ($request->gastosAperturaDomestico != '') {
            $poliza->gastosAperturaDomestico = e($request->gastosAperturaDomestico);
        }
        if ($request->gastosAperturaExportacion != '') {
            $poliza->gastosAperturaExportacion = e($request->gastosAperturaExportacion);
        }
        if ($request->costosProrroga != '') {
            $poliza->costosProrroga = e($request->costosProrroga);
        }
        $poliza->sistemaLinea = e($request->sistemaLinea);
        $poliza->endososEspeciales = e($request->endososEspeciales);
        $poliza->notas = e($request->notas);
        $poliza->save();

        return redirect()->route('polizas.index')->with('info','Actualizado correctamente');
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
