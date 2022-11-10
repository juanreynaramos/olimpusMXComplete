<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;
    protected $fillable = [
        'idAsegurado',
        'idDeudor',
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