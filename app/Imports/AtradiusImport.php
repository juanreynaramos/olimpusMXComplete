<?php

namespace App\Imports;

use App\Models\atradius;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Carbon\Carbon;

class AtradiusImport implements ToModel, WithStartRow, WithValidation, SkipsOnFailure
{
    use Importable,SkipsFailures;
    public function model(array $row)
    {
        return new atradius([
            'numeroPoliza' => $row[1],
            'nombreasegurado' => $row[2],
            'idCliente' => $row[4],
            'nombreCliente' => $row[5],
            'direccionCliente' => $row[6],
            'ciudadCliente' => $row[7],
            'cpCliente' => $row[8],
            'areaCliente' => $row[9],
            'paisCliente' => $row[10],
            'codigoPaisCliente' => $row[11],
            'numeroRegistro' => $row[12],
            'dunyBradstreet' => $row[14],
            'sectorComercial' => $row[18],
            'descripcionSectorComercial' => $row[19],
            'ratingActualCliente' => $row[20],
            'claseRatingCliente' => $row[21],
            'fechaRatingActualCliente' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[22]),
            'ratingAnteriorCliente' => $row[23],
            'claseRatingAnteriorCliente' => $row[24],
            'cambioRatingCliente' => $row[25],
            'idLimiteCredito' => $row[26],
            'monedaPoliza' => $row[27],
            'codigoMonedaPoliza' => $row[28],
            'importeSolicitadoLimitesCredito' => $row[29],
            'importeTotalDecisionesLimiteCredito' => $row[30],
            'importeDecision1' => $row[31],
            'importeDecision2' => $row[32],
            'monedaUsuario' => $row[33],
            'codigoMonedaUsuario' => $row[34],
            'fechaSolicitud' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[39]),
            'fechaDecision' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[40]),
            'fechaExpiracionImporte1' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[41]),
            'fechaExpiracionImporte2' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[42]),
            'fechaEfecto' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[43]),
            'fechaExpiracion' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[44]),
            'tipoDecisionLimiteCredito' => $row[45],
            'condicionLimiteCreditoImporte1' => $row[46],
            'condicionLimiteCreditoImporte2' => $row[47],
            'condicionImporteTotalLimiteCredito' => $row[48],
            'alertaEventosFuturos' => $row[49],
            'indicadorImpago' => $row[50],
        ]);                
    }

    public function rules(): array
    {
        return [
            '*.1'  => 'required|max:10',
            '*.2'  => 'required|max:50',
            '*.4'  => 'required|max:10',
            '*.5'  => 'required|max:150',
            '*.6'  => 'nullable|max:150',
            '*.7'  => 'nullable|max:150',
            '*.8'  => 'nullable|max:15',
            '*.9'  => 'nullable|max:50',
            '*.10' => 'nullable|max:50',
            '*.11' => 'nullable|max:5',
            '*.12' => 'nullable|max:20',
            '*.14' => 'nullable|max:12',
            '*.18' => 'nullable|max:5',
            '*.19' => 'nullable|max:100',
            '*.20' => 'nullable|max:5',
            '*.21' => 'nullable|max:5',
        ];
    }

    public function startRow() : int
    {
        return 2;
    }
    
}
