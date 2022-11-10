@extends('adminlte::page')

@section('title', 'Aseguradoras')

@section('content_header')
    <h1>Asegurado</h1>
@stop

@section('content')
    <div class="card">
	<div class="card-header">
	  <h3 class="card-title">Ver de Asegurado</h3>
    </div>
	<div class="card-body ">
		<div class="row"><div class="col-sm-12"><h4>Generales</h4></div></div>
  <div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label class="control-label">Aseguradora</label>
            <span class="input-group-text">
                <label >{{ $poliza->arz }}</label>
            </span>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label class="control-label">Asegurados</label>
            <span class="input-group-text">
                <label >{{ $poliza->arz2 }}</label>
            </span>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label class="control-label"># Póliza</label>
            <span class="input-group-text">
                <label >{{ $poliza->poliza }}</label>
            </span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label class="control-label">Vigencia</label>
            <div class="input-group" >
                <span class="input-group-text">
                    <i class="fa fa-calendar"></i>
                </span>
                <label >&nbsp;{{ $poliza->inicioVigencia }}&nbsp;</label>
                <span class="input-group-text">al</span>
                <label >&nbsp;{{ $poliza->finVigencia }}</label>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label class="control-label">Tipo de programa</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-university"></i>
                </span>
                <label >&nbsp;{{ $poliza->tipoPrograma }}</label>
            </div>  
        </div>
    </div> 
    <div class="col-sm-2"> 
        <div class="form-group">
            <label class="control-label">Moneda</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-dollar-sign"> </i>
                </span>
                <label >&nbsp;{{ $poliza->monedaPoliza }}</label>
            </div>                                                
        </div>
    </div>
</div>
<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>Prima</h4></div></div>
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Pronostico de ventas</label>                                                
            <div class="input-group">
                <span class="input-group-text"> 
                    <i class="fas fa-dollar-sign"></i>
                </span>
                <label >&nbsp;{{ $poliza->pronosticoVentas }}</label>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Tasa</label>
            <div class="input-group">
                <label >&nbsp;{{ $poliza->tasa }}&nbsp;</label>
                <span class="input-group-text">
                    <i><strong>%</strong></i>
                </span>
            </div>
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Prima total</label>                                                
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-dollar-sign"></i>
                    </span>
                    <label >&nbsp;{{ $poliza->primaTotal }}</label>
                </div>                                                
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Prima mínima</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                </span>
                <label >&nbsp;{{ $poliza->primaMinima }}</label>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Pago trimestral</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                </span>
                <label >&nbsp;{{ $poliza->pagoTrimestral }}</label>
            </div>                                                
        </div>
    </div>
</div>
<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>Condiciones particulares</h4></div></div>
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Países cubiertos &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="input-group-addon">
                          @if($poliza->pagoTrimestral =='SI')
                            <label >&nbsp;Todos</label>
                            @endif
                        </span>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-font"></i>
                </span>
                <label >&nbsp;{{ $poliza->paisesCubiertos }}</label>

            </div>
        </div>
    </div>                               
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Pocentaje de cobertura particular</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>%</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->porcentajeCoberturaParticular }}</label>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label class="control-label">Cifra mínima para pago de siniestros</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                </span>
                <label >&nbsp;{{ $poliza->creditoIndividual }}</label>
            </div>                                                
        </div>
    </div>                                    
</div>
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Deducible anual</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                </span>
                <label >&nbsp;{{ $poliza->deducibleAnual }}</label>
            </div>                                                
        </div>
    </div>   
     <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Responsabilidad máxima</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>#</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->responsabilidadMaxima }}</label>
            <span class="help-block input-group-text"> veces</span>   
            </div>
        </div>
    </div> 
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Monto máximo acumulado</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                </span>
                <label >&nbsp;{{ $poliza->montoMaximoAcumulado }}</label>
            </div>                                                
        </div>
    </div>
</div>
<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>Cobertura de discrecionales</h4></div></div>
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Importe</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                </span>
                <label >&nbsp;{{ $poliza->importe }}</label>
            </div>                                                
        </div>
    </div> 
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Porcentaje de cobertura</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>%</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->porcentajeCoberturaDiscrecional }}</label>
            </div>                                                
        </div>
    </div> 
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Número de indemnizaciones</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>#</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->indemnizaciones }}</label>
                <span class="help-block input-group-text">eventos</span>
            </div>                                                
        </div>
    </div>      
</div>
<div class="row">
    <div class="col-sm-12"> 
        <div class="form-group">
            <label class="control-label">Requisito de límite de crédito discrecional</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-font"></i>
                </span>
                <label >&nbsp;{{ $poliza->requisitoLimiteCredito }}</label>
            </div>                                                
        </div>
    </div>   
</div>
<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>Cobertura primer embarque</h4></div></div>
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Monto cobertura primer embarque</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                </span>
                <label >&nbsp;{{ $poliza->montoCoberturaPrimerEmbarque }}</label>
            </div>                                                
        </div>
    </div> 
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Porcentaje de cobertura</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>%</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->porcentajeCoberturaPrimerEmbarque }}</label>
            </div>                                                
        </div>
    </div> 
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Número de indemnizaciones</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>#</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->numMaximoIndemnizacionesPrimerEmbarque }}</label>
            <span class="help-block input-group-text">eventos</span>
            </div>                                                
        </div>
    </div>      
</div>
<hr class="solid large">
<div class="row">
    <div class="col-sm-12"><h4>Plazos de crédito fecha factura</h4></div>
</div>
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Periodo máximo para declaración de siniestro</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>#</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->periodoDeclaracionSiniestro }}</label>
                <span class="help-block input-group-text">días</span> 
            </div>
        </div>
    </div> 
     <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Plazo máximo de crédito (credito)</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>#</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->plazoCredito }}</label>
                <span class="help-block input-group-text">días</span>
            </div>
        </div>
    </div> 
    <div class="col-sm-4">
        <div class="form-group">
            <label class="control-label">Plazo máximo de crédito especial por póliza</label>                                               
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>#</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->plazoCreditoEspecialPoliza }}</label>
                <span class="help-block input-group-text">días</span>
            </div>
        </div>
    </div>
</div>
<hr class="solid large">
<div class="row">
    <div class="col-sm-12"><h4>Plazos de crédito fecha vencimiento</h4></div>
</div>
<div class="row">
     <div class="col-sm-6"> 
        <div class="form-group">
            <label class="control-label">Plazo máximo de prorroga (MEP)</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>#</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->plazoMEP }}</label>
                <span class="help-block input-group-text">días</span>
            </div>       
        </div>
    </div> 

    
    <div class="col-sm-6"> 
        <div class="form-group">
            <label class="control-label">Periodo máximo para cobros vencidos </label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>#</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->periodoCobroVencido }}</label>
                <span class="help-block input-group-text">días</span>
            </div>

        </div>
    </div> 

</div>
<hr class="solid large">

<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Plazo máximo de crédito especial por deudor</label>                                               
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-font"></i>
                </span>
                <label >&nbsp;{{ $poliza->plazoCreditoEspecialDeudor }}</label>
            </div>                                                                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Periodo de espera para mora prolongada</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>#</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->periodoEsperaMora }}</label>
                <span class="help-block input-group-text">meses</span>
            </div>  
        </div>
    </div> 
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Límite máximo de prorrogas de vencimiento</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                </span>
                <label >&nbsp;{{ $poliza->limiteMaximoProrrogas }}</label>
            </div>                                                
        </div>
    </div>                                            
</div>
<div class="row">
    <div class="col-sm-12"> 
        <div class="form-group">
            <label class="control-label">Suspensión automática de cobertura</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-font"></i>
                </span>
                <label >&nbsp;{{ $poliza->suspensionAutomaticaCobertura }}</label>
            </div>                                                
        </div>
    </div>                              
</div>
<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>Bonus (sujeto a renovación) / Malus sobre primas</h4></div></div>
<div class="row">                                        
    <div class="col-sm-8">
        <div class="form-group">
            <label class="control-label">Retorno // Porcentaje de prima</label>
            <div class="input-daterange input-group">
                <span class="input-group-text">
                    Retorno
                </span>
                <label >&nbsp;{{ $poliza->retorno }}</label>                                        
                <span class="input-group-text">Porcentaje de prima</span>
                <label >&nbsp;{{ $poliza->porcentaje }}</label>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Siniestralidad igual a 0%</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>%</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->siniestralidad0 }}</label>
            </div>                                                
        </div>
    </div> 
</div>
<div class="row">                                                                   
     <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Siniestralidad igual a 10%</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>%</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->siniestralidad10 }}</label>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Bono siniestralidad entre 15% o menor que 18%</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>%</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->bonoSiniestralidad15al18 }}</label>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Bono siniestralidad igual o menor que 15%</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>%</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->bonoSiniestralidad15 }}</label>
            </div>                                                
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Siniestralidad igual a 30%</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>%</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->siniestralidad30 }}</label>
            </div>                                                
        </div>
    </div> 
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Siniestralidad igual a 70% (malus)</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>%</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->siniestralidad70 }}</label>
            </div>                                                
        </div>
    </div> 
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Siniestralidad igual a 100% (malus)</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>%</strong></i>
                </span>
                <label >&nbsp;{{ $poliza->siniestralidad100 }}</label>
            </div>                                                
        </div>
    </div>
</div>  
<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>Servicios adicionales</h4></div></div>
<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            <label class="control-label">Estudio de deudores</label>
            <div class="input-daterange input-group">
                <span class="input-group-text">
                    Doméstico
                </span>
                <label >&nbsp;{{ $poliza->estudioDeudoresDomestico }}</label>
                <span class="input-group-text">Exportación</span>
                <label >&nbsp;{{ $poliza->estudioDeudoresExportacion }}</label>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Revisión de clasificaciones</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                </span>
                <label >&nbsp;{{ $poliza->revisionClasificaciones }}</label>
            </div>                                                
        </div>
    </div> 
</div>
<div class="row">                                    
     <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Mantenimiento de clasificaciones</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                </span>
                <label >&nbsp;{{ $poliza->mantenimientoClasificaciones }}</label>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Costo de prorrogas</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                </span>
                <label >&nbsp;{{ $poliza->costosProrroga }}</label>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Sistema en línea</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-font"></i>
                </span>
                <label >&nbsp;{{ $poliza->sistemaLinea }}</label>
            </div>                                                
        </div>
    </div> 
</div>
<div class="row">
    <div class="col-sm-8"> 
        <div class="form-group">
            <label class="control-label">Gastos apertura</label>
            <div class="input-daterange input-group">
                <span class="input-group-text">
                    Doméstico
                </span>
                <label >&nbsp;{{ $poliza->gastosAperturaDomestico }}</label>
                <span class="input-group-text">Exportación</span>
                <label >&nbsp;{{ $poliza->gastosAperturaExportacion }}</label>
            </div>                                                
        </div>
    </div>                                                                                                                     
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Endosos especiales</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-font"></i>
                </span>
                <label >&nbsp;{{ $poliza->endososEspeciales }}</label>
            </div>                                                
        </div>
    </div>      
</div>
<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>Notas</h4></div></div>
<div class="row">
    <div class="col-sm-12"> 
        <div class="form-group">
            <label class="control-label">Notas del agente de seguros</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-font"></i>
                </span>
                <label >&nbsp;{{ $poliza->notas }}</label>
            </div>                                                
        </div>
    </div>    
</div>
</div>
<link rel="stylesheet" href="/css/admin_custom.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
	</div>
	<div class="card-footer">
      <a class="btn btn-danger float-right col-md-2 offset-md-1" href="{{route('polizas.index')}}">Regresar</a>
      <a class="btn btn-info float-right col-md-2" href="{{route('polizas.edit',$poliza->id)}}">Editar</a>
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
