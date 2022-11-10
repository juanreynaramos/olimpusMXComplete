<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaTemp extends Model
{
    use HasFactory;
    protected $fillable = [
        'razonSocial',
        'identificador',
        'pais',
        'factura',
        'importe',
        'iva',
        'importeTotal',
        'monedaFactura',
        'fechaFactura',
        'fechaVencimiento',
        'plazoCredito',
        'fechaPago',
        'destino',
        'tipoFactura',
        'estatusCliente',
        'comentarios',
    ];

   protected $hidden = ['created_at','update_at'];
}
