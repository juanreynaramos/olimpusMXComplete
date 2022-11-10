<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aig extends Model
{
    use HasFactory;
    protected $fillable = [
        'effectiveDate',
        'buyer',
        'country',
        'duns',
        'globalUltName',
        'requestedLimitAmount',
        'reqLimCurrency',
        'approvedLimitAmount',
        'apprLimCurrency',
        'expiryDate',
        'specialLimitConditions',
        'specialConditions',
        'causaId',
    ];

   protected $hidden = ['created_at','update_at'];
}
