<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aseguradora extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'razonSocial',
        'uri',
    ];
   protected $dates = ['delete_at'];
   protected $hidden = ['created_at','update_at'];
}
