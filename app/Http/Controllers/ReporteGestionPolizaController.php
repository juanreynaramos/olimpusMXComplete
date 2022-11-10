<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Aseguradora;
use App\Models\Asegurado;
use App\Models\Poliza;
use App\Models\Deudor;
use App\Models\Lineas;
use App\Models\Ventas;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use DB;

class ReporteGestionPolizaController extends Controller
{
    public function __construct()
   {
        $this->middleware('auth');
   }

   public function validaUser()
   {
    $id = Auth::id();
      $users = DB::table('users')->where('id','=',$id)->get();
      foreach ($users as $value) {
        return $value->perfil;
      }
   }    

    public function index()
    {
        if ($this->validaUser()!== "SISTEMAS") {
            return view('home');
        }
        $polizas = Poliza::orderBy('polizas.id','ASC')
            ->join('asegurados', 'asegurados.id', '=', 'polizas.idAsegurado')
            ->select('polizas.*', 'asegurados.razonSocial as arz')->get();
        return view('reporteGestionPoliza.index',compact('polizas'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $idA = e($request->idA);
        $fechaHoy = Carbon::now();
        $fechaHoy2 = $fechaHoy->format('d-m-Y');
        $fechaHoy = $fechaHoy->format('YmdHms');
        $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        $inputFileName = $storagePath."reporteGestion.xlsx";
        $inputFileType = 'Xlsx';
        $reader = IOFactory::createReader($inputFileType);
        $reader->setLoadAllSheets();
        $spreadsheet = $reader->load($inputFileName);
        $sheet = $spreadsheet->getActiveSheet(0);

        $polizas = Poliza::where('polizas.id',$idA)->orderBy('polizas.id','ASC')
            ->join('asegurados', 'asegurados.id', '=', 'polizas.idAsegurado')
            ->select('polizas.*', 'asegurados.razonSocial as arz')->firstOrFail();
        $importeVenta = Ventas::whereBetween('fechaFactura',[$polizas->inicioVigencia,$polizas->finVigencia])->sum('importeTotal');
        $sheet->setCellValue('G2', "REPORTE DE GESTIÓN A LA FECHA ".$fechaHoy2);
        $sheet->setCellValue('B2', "".$polizas->arz);
        $sheet->setCellValue('B3', "".$polizas->finVigencia);
        $sheet->setCellValue('C3', "Vigencia:");
        $sheet->setCellValue('D3', $polizas->inicioVigencia." - ".$polizas->finVigencia);
        $sheet->setCellValue('C4', "Póliza:");
        $sheet->setCellValue('D4', $polizas->poliza."");
        $sheet->setCellValue('C8', $polizas->pronosticoVentas."");
        $sheet->setCellValue('C9', $polizas->tasa."");
        $sheet->setCellValue('C10', $polizas->primaTotal."");
        $sheet->setCellValue('C11', $polizas->primaMinima."");
        $sheet->setCellValue('D8', $importeVenta."");
        $sheet->setCellValue('D9', $polizas->tasa."");
        $sheet->setCellValue('D10', ($importeVenta*$polizas->tasa)."");
        $sheet->setCellValue('D11', $polizas->primaMinima."");
        $posibleAjuste = ($importeVenta*$polizas->tasa)-$polizas->primaMinima;
        if ($posibleAjuste < 0) {
            $posibleAjuste = 0;
        }
        $sheet->setCellValue('D11', $posibleAjuste ."");
        $alcanzado = ($importeVenta*100)/$polizas->pronosticoVentas;

        $sheet->setCellValue('E8', $alcanzado);

        $sheet2 = $spreadsheet->setActiveSheetIndex(1);
        $sheet2->setCellValue('A2', "REPORTE DE GESTIÓN A LA FECHA ".$fechaHoy2);
        $sheet3 = $spreadsheet->setActiveSheetIndex(2);
        $sheet3->setCellValue('A2', "REPORTE DE GESTIÓN A LA FECHA ".$fechaHoy2);

        $writer = IOFactory::createWriter($spreadsheet,'Xlsx');
        $writer->save($storagePath.'excel/Reporte/Gestion'.$fechaHoy.'.xlsx');
        //Storage::disk('local')->move('Gestion'.$fechaHoy.'.xlsx', 'excel/Reporte/Gestion'.$fechaHoy.'.xlsx');

        return view('reporteGestionPoliza.create',['archivo'=>"Se ha creado tu reporte de gestión satisfactoriamente.",'lin'=>'Gestion'.$fechaHoy.'.xlsx']);

    }
//  SELECT  `asegurado_id`, `deudor_id`, `n_factura`,`monto`, `iva`, `total`,`moneda`, `fecha_factura`, `fecha_vencimiento`,  `destino`, `descripcion`,p.mes_periodo as mesyear  FROM `ventas` INNER JOIN periodos p WHERE 1
    
    public function show($id)
    {
        $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        return response()->download($storagePath."excel/Reporte/".$id);

    }

    public function meses($date)
    {
        $mes = "";
        switch ($date) {
            case '01':
                $mes = "Enero";
                break;
            case '02':
                $mes = "Febrero";
                break;
            case '03':
                $mes = "Marzo";
                break;
            case '04':
                $mes = "Abril";
                break;
            case '05':
                $mes = "Mayo";
                break;
            case '06':
                $mes = "Junio";
                break;
            case '07':
                $mes = "Julio";
                break;
            case '08':
                $mes = "Agosto";
                break;
            case '09':
                $mes = "Septiembre";
                break;
            case '10':
                $mes = "Octubre";
                break;
            case '11':
                $mes = "Noviembre";
                break;
            case '12':
                $mes = "Diciembre";
                break;
        }

        return $mes;
    }
    
    public function edit($id)
    {
        /*'mysql' => array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'olimpus_dev',
            'username'  => 'orthos_dev',
            'password'  => 'Intr@n3t#18',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ),*/
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
