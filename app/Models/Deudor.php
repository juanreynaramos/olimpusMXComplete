<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deudor extends Model
{
    use HasFactory;
    protected $fillable = [
        'razonSocial',
        'rfc',
        'pais',
        'cp',
        'ciudad',
        'poblacion',
        'codigoPais',
        'estadoProvincia',
        'direccion',
        'claveCliente',
        'duns',
        'giro',
        'descripcionGiro',
    ];
   protected $hidden = ['created_at','update_at'];
}
