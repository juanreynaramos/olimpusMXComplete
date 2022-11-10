<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class atradius extends Model
{
    use HasFactory;
    protected $fillable = [
        'numeroPoliza',
        'nombreasegurado',
        'idCliente',
        'nombreCliente',
        'direccionCliente',
        'ciudadCliente',
        'cpCliente',
        'areaCliente',
        'paisCliente',
        'codigoPaisCliente',
        'numeroRegistro',
        'dunyBradstreet',
        'sectorComercial',
        'descripcionSectorComercial',
        'ratingActualCliente',
        'claseRatingCliente',
        'fechaRatingActualCliente',
        'ratingAnteriorCliente',
        'claseRatingAnteriorCliente',
        'cambioRatingCliente',
        'idLimiteCredito',
        'monedaPoliza',
        'codigoMonedaPoliza',
        'importeSolicitadoLimitesCredito',
        'importeTotalDecisionesLimiteCredito',
        'importeDecision1',
        'importeDecision2',
        'monedaUsuario',
        'codigoMonedaUsuario',
        'fechaSolicitud',
        'fechaDecision',
        'fechaExpiracionImporte1',
        'fechaExpiracionImporte2',
        'fechaEfecto',
        'fechaExpiracion',
        'tipoDecisionLimiteCredito',
        'condicionLimiteCreditoImporte1',
        'condicionLimiteCreditoImporte2',
        'condicionImporteTotalLimiteCredito',
        'alertaEventosFuturos',
        'indicadorImpago',
        'causaId',
    ];

   protected $hidden = ['created_at','update_at'];
}
