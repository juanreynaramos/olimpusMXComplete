<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lineas extends Model
{
    use HasFactory;
     protected $fillable = [
        'idAseguradora',
        'idAsegurado',
        'idDeudor',
        'fechaSolicitud',
        'importeSolicitado',
        'importeAsegurado',
        'decision',
        'tipoDecision',
        'fechaEfecto',
        'fechaVencimiento',
        'fechaAnulacion',
        'divisaSolicitada',
        'divisaAsegurada',
        'desicion1',
        'desicion2',
        'desicion3',
        'rating',
        'ratingAnterior',
        'causaId',
        'mesyear',
    ];


    public function asegurado()
    {
        return $this->belongsTo(Asegurado::class);
    }

    public function aseguradora()
    {
        return $this->belongsTo(Aseguradora::class);
    }

    public function deudor()
    {
        return $this->belongsTo(Deudor::class);
    }

   protected $hidden = ['created_at','update_at'];
}
