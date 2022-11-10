<?php

namespace App\Imports;

use App\Models\Aig;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Carbon\Carbon;
class AigImport implements ToModel, WithStartRow, WithValidation, SkipsOnFailure
{
    
    use Importable,SkipsFailures;
    private $numRows = 0;
    protected $meses = [ "Jan" => "01", "Feb" => "02","Mar" => "03", "Apr" => "04","May" => "05", "Jun" => "06","Jul" => "07", "Aug" => "08","Sep" => "09", "Oct" => "10","Nov" => "11", "Dec" => "12"];
    public function model(array $row)
    {
        
        list($dia,$mes,$year) = explode(" ", $row[0]);
        $effectiveDate = $year."-".$this->meses[$mes]."-".$dia;
        list($dia2,$mes2,$year2) = explode(" ", $row[10]);
        $expiryDate = "20".$year2."-".$this->meses[$mes2]."-".$dia2;
        $this->numRows++;
        return new Aig([
            'effectiveDate' => $effectiveDate,
            'buyer' => $row[1],
            'country' => $row[2],
            'duns' => $row[3],
            'globalUltName' => $row[4],
            'requestedLimitAmount' => $row[6],
            'reqLimCurrency' => $row[7],
            'approvedLimitAmount' => $row[8],
            'apprLimCurrency' => $row[9],
            'expiryDate' => $expiryDate,
            'specialLimitConditions' => $row[11],
            'specialConditions' => $row[12],
            'causaId' => $row[13],
        ]);
    }

     public function rules(): array
    {
        return [
            '*.0'  => 'nullable|max:16',
            '*.1'  => 'nullable|max:150',
            '*.2'  => 'required|max:50',
            '*.3'  => 'nullable|max:12',
            '*.4'  => 'required|max:150',
            '*.6'  => 'required|numeric',
            '*.7'  => 'nullable|max:150',
            '*.8'  => 'required|numeric',
            '*.9'  => 'nullable|max:15',
            '*.10' => 'nullable|max:16',
            '*.11' => 'nullable|max:50',
            '*.12' => 'nullable',
            '*.13' => 'max:5',
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

}