<div class="row"><div class="col-sm-12"><h4>Generales</h4></div></div>
	<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label class="control-label">Aseguradora</label>
            {!! Form::select('idAseguradora',$aseguradoras, null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label class="control-label">Asegurados</label>       
            {!! Form::select('idAsegurado',$asegurados, null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label class="control-label"># Póliza</label>
            {{ Form::text('poliza', null, ["class"=>"form-control"]) }}
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
                 {{ Form::input('text', 'inicioVigencia', null, ['class' => 'form-control inicioVigencia']) }}
                <span class="input-group-text">al</span>
                {{ Form::input('text', 'finVigencia', null, ['class' => 'form-control finVigencia']) }}
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
                {{ Form::input('text', 'tipoPrograma', null,["class"=>"form-control"]) }}
            </div>  
        </div>
    </div> 
    <div class="col-sm-2"> 
        <div class="form-group">
            <label class="control-label">Moneda</label>                                                
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                </span>
               {{  Form::select('monedaPoliza',['USD'=>'USD','MXN'=>'MXN'],'MXN',['class'=>"form-control"]) }}
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
                {{ Form::input('text', 'pronosticoVentas', null, ["class"=>"form-control"]) }}
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Tasa</label>
            <div class="input-group">
                {{ Form::input('text', 'tasa', null, ["class"=>"form-control"]) }}
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
                    {{ Form::input('text', 'primaTotal', null, ["class"=>"form-control"]) }}
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
                {{ Form::input('text', 'primaMinima', null, ["class"=>"form-control"]) }}
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
                {{ Form::input('text', 'pagoTrimestral', null, [
                "class"=>"form-control"]) }}
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
                            <input class="form-check-input" type="radio" name="paisesCubiertosTodos" id="radio1" value="SI">
                            <label class="form-check-label" for="radio1">Todos</label>
                        </span>
                      <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input class="form-check-input" type="radio" name="paisesCubiertosTodos" id="radio2" value="NO">
                      <label class="form-check-label" for="radios2">
                        Otro
                      </label></span></label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-font"></i>
                </span>
               {{  Form::input('text','paisesCubiertos',null,['class'=>"form-control"]) }}
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
               {{  Form::input('text','porcentajeCoberturaParticular',null,['pattern'=>"^\d*(\.\d{2}$)?",'class'=>"form-control"]) }}
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
                {{ Form::input('text', 'creditoIndividual', null, ["data-money"=>"true",
                "class"=>"form-control"]) }}
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
                {{ Form::input('text', 'deducibleAnual', null, ["data-money"=>"true",
                "class"=>"form-control"]) }}
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
                {{ Form::input('number', 'responsabilidadMaxima', null,["class"=>"form-control col-sm-6"]) }}
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
                {{ Form::input('text', 'montoMaximoAcumulado',null, ["data-money"=>"true",
                "class"=>"form-control"]) }}
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
                {{ Form::input('text', 'importe', null, ["class"=>"form-control"]) }}
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
                {{ Form::input('text', 'porcentajeCoberturaDiscrecional', null, ["class"=>"form-control"]) }}
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
                {{ Form::input('number', 'indemnizaciones', null,["class"=>"form-control col-sm-6"]) }}
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
                {{ Form::textarea('requisitoLimiteCredito', null,["rows"=>"3","class"=>"form-control"]) }}
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
                {{ Form::input('text', 'montoCoberturaPrimerEmbarque', null, ["class"=>"form-control"]) }}
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
                {{ Form::input('text', 'porcentajeCoberturaPrimerEmbarque', null, ["class"=>"form-control"]) }}
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
                {{ Form::input('number', 'numMaximoIndemnizacionesPrimerEmbarque', null, ["class"=>"form-control col-sm-6"]) }}
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
                {{ Form::input('number', 'periodoDeclaracionSiniestro', null, ["class"=>"form-control col-sm-6"]) }}
                <span class="help-block input-group-text">días</span> 
            </div>
        </div>
    </div> 
     <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Plazo máximo de crédito   (credito)</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i><strong>#</strong></i>
                </span>
                {{ Form::input('number', 'plazoCredito', null, ["class"=>"form-control col-sm-6"]) }}
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
                {{ Form::input('number', 'plazoCreditoEspecialPoliza', null, ["class"=>"form-control col-sm-6"]) }}
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
                {{ Form::input('number', 'plazoMEP', null, ["class"=>"form-control col-sm-6"]) }}
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
                {{ Form::input('number', 'periodoCobroVencido', null, ["class"=>"form-control col-sm-6"]) }}
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
                {{ Form::input('text', 'plazoCreditoEspecialDeudor', null, ["class"=>"form-control"]) }}
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
                {{ Form::input('number', 'periodoEsperaMora', null, ["class"=>"form-control col-sm-6"]) }}
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
                {{ Form::input('text', 'limiteMaximoProrrogas', null, ["data-money"=>"true",
                "class"=>"form-control"]) }}
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
                {{ Form::textarea('suspensionAutomaticaCobertura', null, ["rows"=>"3","class"=>"form-control"]) }}
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
                 {{ Form::input('number', 'retorno', null, [
                            'class' => 'form-control'                                                              
                            ])    }}                                                    
                <span class="input-group-text">Porcentaje de prima</span>
                {{ Form::input('number', 'porcentaje', null, [
                            'class' => 'form-control'                                                              
                            ])    }}
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
                {{ Form::input('text', 'siniestralidad0', null, ['pattern'=>"^\d*(\.\d{2}$)?","class"=>"form-control"]) }}
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
                {{ Form::input('text', 'siniestralidad10', null, ['pattern'=>"^\d*(\.\d{2}$)?","class"=>"form-control"]) }}
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
                {{ Form::input('text', 'bonoSiniestralidad15al18', null, ['pattern'=>"^\d*(\.\d{2}$)?","class"=>"form-control"]) }}
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
                {{ Form::input('text', 'bonoSiniestralidad15', null, ['pattern'=>"^\d*(\.\d{2}$)?","class"=>"form-control"]) }}
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
                {{ Form::input('text', 'siniestralidad30', null, ['pattern'=>"^\d*(\.\d{2}$)?","class"=>"form-control"]) }}
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
                {{ Form::input('text', 'siniestralidad70', null, ['pattern'=>"^\d*(\.\d{2}$)?","class"=>"form-control"]) }}
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
                {{ Form::input('text', 'siniestralidad100', null, ['pattern'=>"^\d*(\.\d{2}$)?","class"=>"form-control"]) }}
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
                 {{ Form::input('text', 'estudioDeudoresDomestico', null, [
                            'pattern'=>"^\d*(\.\d{2}$)?",
                            'class' => 'form-control'                                                              
                            ])    }}                                                    
                <span class="input-group-text">Exportación</span>
                {{ Form::input('text', 'estudioDeudoresExportacion', null, [
                            'pattern'=>"^\d*(\.\d{2}$)?",
                            'class' => 'form-control'                                                              
                            ])    }}
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
                {{ Form::input('text', 'revisionClasificaciones', null, ['pattern'=>"^\d*(\.\d{2}$)?","class"=>"form-control"]) }}
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
                {{ Form::input('text', 'mantenimientoClasificaciones', null, ['pattern'=>"^\d*(\.\d{2}$)?","class"=>"form-control"]) }}
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
                {{ Form::input('text', 'costosProrroga', null, ['pattern'=>"^\d*(\.\d{2}$)?","class"=>"form-control"]) }}
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
                {{ Form::input('text', 'sistemaLinea', null, ["class"=>"form-control"]) }}
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
                 {{ Form::input('text', 'gastosAperturaDomestico', null, [
                            'pattern'=>"^\d*(\.\d{2}$)?",
                            'class' => 'form-control'                                                              
                            ])    }}                                                    
                <span class="input-group-text">Exportación</span>
                {{ Form::input('text', 'gastosAperturaExportacion', null, [
                            'pattern'=>"^\d*(\.\d{2}$)?",
                            'class' => 'form-control'                                                              
                            ])    }}
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
                {{ Form::textarea('endososEspeciales', null,['rows'=>'3',"class"=>"form-control"]) }}
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
                {{ Form::textarea('notas',null,['rows'=>'5',"class"=>"form-control"]) }}
            </div>                                                
        </div>
    </div>    
</div>
</div>
<link rel="stylesheet" href="/css/admin_custom.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">