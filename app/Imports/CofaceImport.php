<?php

namespace App\Imports;

use App\Models\Coface;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class CofaceImport implements ToModel, WithStartRow, WithValidation, SkipsOnFailure
{
    
    use Importable,SkipsFailures;
    private $numRows = 0;
    public function model(array $row)
    {
        $rfc = "";
        $duns = "";
        $fechaSolicitud = "";
        $fechaDecision = "";
        $fechaEfecto = "";
        $fechaFinalizacion = "";
        $cantidadAsegurada = $row[38];
        $importeSolicitado = $row[25];
        if (strpos($row[11], 'Identificación Fiscal') !== false) {
            $rfc = str_replace('-','',$row[12]);
        }else if (strpos($row[11], 'D-U-N-S') !== false) {
            $duns = $row[12];
        }

        if ($row[23] =="" || is_null($row[23])) {
            $fechaSolicitud = "1900-01-01";
        }else
        {
            $fechaSolicitud = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[23]);
        }

        if ($row[30] =="" || is_null($row[30])) {
            $fechaDecision = "1900-01-01";
        }else
        {
            $fechaDecision = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[30]);
        }

        if ($row[36] =="" || is_null($row[36])) {
            $fechaEfecto = "1900-01-01";
        }else
        {
            $fechaEfecto = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[36]);
        }

        if ($row[37] =="" || is_null($row[37])) {
            $fechaFinalizacion = "1900-01-01";
        }else
        {
            $fechaFinalizacion = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[37]);
        }
        if ($row[38] =="" || is_null($row[38])) {
            $cantidadAsegurada = 0.0;
        }
        if ($importeSolicitado =="" || is_null($importeSolicitado)) {
            $importeSolicitado = 0.0;
        }

        $this->numRows++;
        return new Coface([
            'razonSocial' => $row[0],
            'direccion' => $row[3],
            'ciudadCliente' => $row[4],
            'cpCliente' => $row[6],
            'estadoProvincia' => $row[7],
            'paisCliente' => $row[8],
            'codigoPaisCliente' => $row[9],
            'duns' => $duns,
            'rfc' => $rfc,
            'producto' => $row[17],
            'rating' => $row[22],
            'fechaSolicitud' => $fechaSolicitud,
            'importeSolicitado' => $importeSolicitado,
            'importeDivisaSolicitada' => $row[26],
            'modoPago' => $row[29],
            'fechaDecision' => $fechaDecision,
            'estadoDesicion' => $row[31],
            'tipoDesicion' => $row[32],
            'desicion1' => $row[33],
            'desicion2' => $row[34],
            'desicion3' => $row[35],
            'fechaEfecto' => $fechaEfecto,
            'fechaFinalizacion' => $fechaFinalizacion,
            'cantidadAsegurada' => $cantidadAsegurada,
            'monedaAsegurada' => $row[39],
            'comentarioDecision' => $row[46],
            'dra' => $row[48],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.0'  => 'required|max:100',
            '*.3'  => 'nullable|max:250',
            '*.4'  => 'nullable|max:100',
            '*.6'  => 'nullable|max:10',
            '*.7'  => 'nullable|max:100',
            '*.8'  => 'nullable|max:100',
            '*.9'  => 'nullable|max:5',
            '*.17' => 'nullable|max:50',
            '*.22' => 'nullable|max:10',
            '*.25' => 'nullable|numeric',
            '*.26' => 'nullable|max:5',
            '*.29' => 'nullable|max:70',
            '*.30' => 'nullable|max:20',
            '*.31' => 'nullable|max:50',
            '*.32' => 'nullable|max:75',
            '*.33' => 'nullable|max:255',
            '*.34' => 'nullable|max:255',
            '*.35' => 'nullable|max:255',
            '*.38' => 'nullable|numeric',
            '*.39' => 'max:5',
            '*.48' => 'max:8',
        ];
    }

    public function getRowCount(): int
    {
        return $this->numRows;
    }

    public function startRow() : int
    {
        return 2;
    }

    /*
            '*.0'  => 'required|max:100',
            '*.2'  => 'nullable|max:250',
            '*.3'  => 'nullable|max:100',
            '*.4'  => 'nullable|max:10',
            '*.5'  => 'nullable|max:100',
            '*.6'  => 'nullable|max:100',
            '*.7'  => 'nullable|max:5',
            '*.8'  => 'nullable',
            '*.10' => 'nullable|max:25',
            '*.15' => 'nullable|max:50',
            '*.20' => 'nullable|max:10',
            '*.21' => 'nullable',
            '*.23' => 'nullable|numeric',
            '*.24' => 'nullable|max:5',
            '*.27' => 'nullable',
            '*.28' => 'nullable',
            '*.29' => 'nullable|max:50',
            '*.30' => 'nullable|max:70',
            '*.31' => 'nullable|max:255',
            '*.32' => 'nullable|max:255',
            '*.33' => 'nullable|max:255',
            '*.34' => 'nullable',
            '*.35' => 'nullable',
            '*.36' => 'nullable|numeric',
            '*.37' => 'nullable|max:5',
            '*.44' => 'nullable',
            '*.46' => 'nullable|max:8',
            '*.51' => 'nullable',
            '*.52' => 'nullable',
    */

}
