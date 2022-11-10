<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asegurado extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'razonSocial',
        'direccion',
        'rfc',
        'email',
        'email2',
        'email3',
        'email4',
        'valorSaldoEstimadoPromedio',
    ];
   protected $dates = ['delete_at'];
   protected $hidden = ['created_at','update_at'];
}
