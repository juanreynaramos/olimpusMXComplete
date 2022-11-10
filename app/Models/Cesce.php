<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cesce extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombreDeudor',
        'rfc',
        'paisDeudor',
        'importeSolicitado',
        'importeConcedido',
        'divisa',
        'condicionesPagoConcedido',
        'situacion',
        'fechaEfecto',
        'fechaAnulacion',
        'fechaValidez',
        'condicionesPagoSolicitado',
        'fechaSolicitud',
        'reporteComercial',
        'reportePolitico',
        'importeVentasAnual',
        'importeVentasAnual1',
        'avalistas',
        'motivosClasificacion',
        'referenciaCliente',
    ];

   protected $hidden = ['created_at','update_at'];
}
