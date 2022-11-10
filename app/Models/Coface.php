<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coface extends Model
{
    use HasFactory;
    protected $fillable = [
        'razonSocial',
        'direccion',
        'ciudadCliente',
        'cpCliente',
        'estadoProvincia',
        'paisCliente',
        'codigoPaisCliente',
        'duns',
        'rfc',
        'producto',
        'rating',
        'fechaSolicitud',
        'importeSolicitado',
        'importeDivisaSolicitada',
        'modoPago',
        'fechaDecision',
        'estadoDesicion',
        'tipoDesicion',
        'desicion1',
        'desicion2',
        'desicion3',
        'fechaEfecto',
        'fechaFinalizacion',
        'cantidadAsegurada',
        'monedaAsegurada',
        'comentarioDecision',
        'dra',
    ];

   protected $hidden = ['created_at','update_at'];
}
