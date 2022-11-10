<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliza extends Model
{
    use HasFactory;
    protected $fillable = [
        'idAseguradora',
        'idAsegurado',
        'poliza',
        'inicioVigencia',
        'finVigencia',
        'tipoPrograma',
        'pronosticoVentas',
        'tasa',
        'primaTotal',
        'primaMinima',
        'pagoTrimestral',
        'monedaPoliza',
        'paisesCubiertos',
        'paisesCubiertosTodos',
        'porcentajeCoberturaParticular',
        'creditoIndividual',
        'deducibleAnual',
        'responsabilidadMaxima',
        'montoMaximoAcumulado',
        'importe',
        'porcentajeCoberturaDiscrecional',
        'indemnizaciones',
        'montoMaximoIndemnizaciones',
        'requisitoLimiteCredito',
        'montoCoberturaPrimerEmbarque',
        'porcentajeCoberturaPrimerEmbarque',
        'numMaximoIndemnizacionesPrimerEmbarque',
        'periodoDeclaracionSiniestro',
        'apartirDe',
        'plazoCredito',
        'plazoCreditoEspecialPoliza',
        'plazoCreditoEspecialDeudor',
        'periodoCobroVencido',
        'plazoMEP',
        'periodoEsperaMora',
        'suspensionAutomaticaCobertura',
        'limiteMaximoProrrogas',
        'retorno',
        'porcentaje',
        'siniestralidad0',
        'siniestralidad10',
        'bonoSiniestralidad15al18',
        'bonoSiniestralidad15',
        'siniestralidad30',
        'siniestralidad70',
        'siniestralidad100',
        'estudioDeudoresDomestico',
        'estudioDeudoresExportacion',
        'revisionClasificaciones',
        'mantenimientoClasificaciones',
        'gastosAperturaDomestico',
        'gastosAperturaExportacion',
        'costosProrroga',
        'sistemaLinea',
        'endososEspeciales',
        'notas',
    ];
    protected static $rules = [
        'poliza' => 'required|unique:polizas,poliza,:id'
    ];
    public function asegurados(){
		return $this->belongsToMany('Asegurado');
	}	
	public function aseguradora(){
		return $this->belongsTo('Aseguradora');
	}

   protected $hidden = ['created_at','update_at'];
}
