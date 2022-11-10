<?php

namespace App\Imports;

use App\Models\Cesce;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class CesceImport implements ToModel, WithStartRow, WithValidation,WithCustomCsvSettings, SkipsOnFailure
{
    use Importable,SkipsFailures;
    private $numRows = 0;

    public function model(array $row)
    {
        $this->numRows++;
        $fechaEfecto = $row[10];
        if ($fechaEfecto =="" || is_null($fechaEfecto)) {
            $fechaEfecto = "1900-01-01";
        }else
        {
            $fechaEfecto = substr($fechaEfecto,0,4)."-".substr($fechaEfecto,4,2)."-".substr($fechaEfecto,6,2);
        }
        $fechaAnulacion = $row[11];
        if ($fechaAnulacion =="" || is_null($fechaAnulacion)) {
            $fechaAnulacion = "1900-01-01";
        }else
        {
            $fechaAnulacion = substr($fechaAnulacion,0,4)."-".substr($fechaAnulacion,4,2)."-".substr($fechaAnulacion,6,2);
        }
        $fechaValidez = $row[12];
        if ($fechaValidez =="" || is_null($fechaValidez)) {
            $fechaValidez = "1900-01-01";
        }else
        {
            $fechaValidez = substr($fechaValidez,0,4)."-".substr($fechaValidez,4,2)."-".substr($fechaValidez,6,2);
        }
        $fechaSolicitud = $row[14];
        if ($fechaSolicitud =="" || is_null($fechaSolicitud)) {
            $fechaSolicitud = "1900-01-01";
        }else
        {
            $fechaSolicitud = substr($fechaSolicitud,0,4)."-".substr($fechaSolicitud,4,2)."-".substr($fechaSolicitud,6,2);
        }
        $importeSolicitado = $row[5];
        if ($importeSolicitado =="" || is_null($importeSolicitado)) {
            $importeSolicitado = 0.0;
        }else
        {
            $importeSolicitado = str_replace('.','',$importeSolicitado);
            $importeSolicitado = str_replace(',','.',$importeSolicitado);
        }
        $importeConcedido = $row[6];
        if ($importeConcedido =="" || is_null($importeConcedido)) {
            $importeConcedido = 0.0;
        }else
        {
            $importeConcedido = str_replace('.','',$importeConcedido);
            $importeConcedido = str_replace(',','.',$importeConcedido);
        }
        $importeVentasAnual = $row[17];
        if ($importeVentasAnual =="" || is_null($importeVentasAnual)) {
            $importeVentasAnual = 0.0;
        }else
        {
            $importeVentasAnual = str_replace('.','',$importeVentasAnual);
            $importeVentasAnual = str_replace(',','.',$importeVentasAnual);
        }
        $importeVentasAnual1 = $row[18];
        if ($importeVentasAnual1 =="" || is_null($importeVentasAnual1)) {
            $importeVentasAnual1 = 0.0;
        }else
        {
            $importeVentasAnual1 = str_replace('.','',$importeVentasAnual1);
            $importeVentasAnual1 = str_replace(',','.',$importeVentasAnual1);
        }
        return new Cesce([
            'nombreDeudor' => str_replace(',','.',$row[2]),
            'rfc' => $row[3],
            'paisDeudor' => $row[4],
            'importeSolicitado' => $importeSolicitado,
            'importeConcedido' => $importeConcedido,
            'divisa' => $row[7],
            'condicionesPagoConcedido' => $row[8],
            'situacion' => $row[9],
            'fechaEfecto' => $fechaEfecto,
            'fechaAnulacion' => $fechaAnulacion,
            'fechaValidez' => $fechaValidez,
            'condicionesPagoSolicitado' => $row[13],
            'fechaSolicitud' => $fechaSolicitud,
            'reporteComercial' => str_replace(',','.',$row[15]),
            'reportePolitico' => str_replace(',','.',$row[16]),
            'importeVentasAnual' => $importeVentasAnual,
            'importeVentasAnual1' => $importeVentasAnual1,
            'avalistas' => $row[19],
            'motivosClasificacion' => $row[20],
            'referenciaCliente' => $row[21]
        ]);
    }

    public function rules(): array
    {
        return [
            '*.2'  => 'required|max:150',
            '*.4'  => 'nullable|max:50',
            '*.6'  => 'nullable|max:25',
            '*.8'  => 'nullable|max:20',
            '*.9'  => 'nullable|max:25',
            '*.10' => 'nullable|max:10',
            '*.11' => 'nullable|max:10',
            '*.12' => 'nullable|max:10',
            '*.13' => 'nullable|max:50',
            '*.14' => 'nullable|max:10',
            '*.15' => 'nullable|max:10',
            '*.16' => 'nullable|max:10',
            '*.17' => 'nullable|max:25',
            '*.18' => 'nullable|max:25',
            '*.19' => 'nullable|max:2',
            '*.20' => 'nullable|max:25',
            '*.21' => 'nullable|max:25',
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

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';',
            'input_encoding' => 'ISO-8859-1'
        ];
    }

}
