<?php

namespace App\Imports;

use App\Models\VentaTemp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Carbon\Carbon;

class VentasImport implements ToModel, WithStartRow, WithValidation, SkipsOnFailure
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable,SkipsFailures;
    public function model(array $row)
    {
        $findme = "/";
        $identificador = str_replace('-', '', $row[8]);
        if ($identificador=="XEXX010101000") {
            $identificador = "";
        }
        $fechaFactura = $row[8];
        if ($fechaFactura =="" || is_null($fechaFactura)) {
            $fechaFactura = "1900-01-01";
        }else
        {
            $pos = strpos($fechaFactura, $findme);
            if ($pos === false) {
                $fechaFactura = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[8]);
            }else
            {
                list($dia, $mes, $year) = explode("/", $fechaFactura);
                if (strlen($year)==2) {
                    $year = "20".$year;
                }
                $fechaFactura = $year."-".$mes."-".$dia;
            }
        }

        $fechaVencimiento = $row[9];
        if ($fechaVencimiento =="" || is_null($fechaVencimiento)) {
            $fechaVencimiento = "1900-01-01";
        }else
        {
            $pos = strpos($fechaVencimiento, $findme);
            if ($pos === false) {
                $fechaVencimiento = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[9]);
            }else
            {
                list($dia, $mes, $year) = explode("/", $fechaVencimiento);
                if (strlen($year)==2) {
                    $year = "20".$year;
                }
                $fechaVencimiento = $year."-".$mes."-".$dia;
            }
        }

        $fechaPago = $row[11];
        if ($fechaPago =="" || is_null($fechaPago)) {
            $fechaPago = "1900-01-01";
        }else
        {
            $pos = strpos($fechaPago, $findme);
            if ($pos === false) {
                $fechaPago = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[11]);
            }else
            {
                list($dia, $mes, $year) = explode("/", $fechaPago);
                if (strlen($year)==2) {
                    $year = "20".$year;
                }
                $fechaPago = $year."-".$mes."-".$dia;
            }
        }
        return new VentaTemp([
            'razonSocial' => $row[0],
            'identificador' => $identificador,
            'pais' => $row[2],
            'factura' => $row[3],
            'importe' => $row[4],
            'iva' => $row[5],
            'importeTotal' => $row[6],
            'monedaFactura' => $row[7],
            'fechaFactura' => $fechaFactura,
            'fechaVencimiento' => $fechaVencimiento,
            'plazoCredito' => $row[10],
            'fechaPago' => $fechaPago,
            'destino' => $row[12],
            'tipoFactura' => $row[13],
            'estatusCliente' => $row[14],
            'comentarios' => $row[15]
        ]);
    }

    public function rules(): array
    {
        return [
            '*.0'  => 'nullable|max:150',
            '*.1'  => 'nullable|max:25',
            '*.2'  => 'nullable|max:20',
            '*.3'  => 'nullable|max:25',
            '*.4'  => 'nullable',
            '*.5'  => 'nullable',
            '*.6'  => 'nullable',
            '*.7'  => 'nullable|max:5',
            '*.8'  => 'nullable|max:20',
            '*.9'  => 'nullable|max:20',
            '*.10' => 'nullable|max:50',
            '*.11' => 'nullable|max:20',
            '*.12' => 'nullable|max:25',
            '*.13' => 'nullable|max:25',
            '*.14' => 'nullable|max:25',
            '*.15' => 'nullable|max:500',
        ];
    }

    public function startRow() : int
    {
        return 2;
    }
}
