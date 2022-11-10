<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|C:\xampp\htdocs\OlimpusMx\vendor\laravel\framework\src\Illuminate\Pagination\resources\views\tailwind.blade.php:
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Route::get('/aseguradora','App\Http\Controllers\AseguradoraController@index');

Route::resource('/aseguradoras','App\Http\Controllers\AseguradoraController')->names('aseguradoras');
Route::resource('/asegurados','App\Http\Controllers\AseguradoController')->names('asegurados');
Route::resource('/deudores','App\Http\Controllers\DeudorController')->names('deudores');
Route::post('/asegurado','App\Http\Controllers\AseguradoController@razonSocial')->name('razonSocial');
Route::resource('/subidaLineas','App\Http\Controllers\SubidaLineas')->names('subidaLineas');
Route::resource('/lineas','App\Http\Controllers\LineasController')->names('lineas');
Route::resource('/ventas','App\Http\Controllers\VentasController')->names('ventas');
Route::post('/valida','App\Http\Controllers\VentasController@valida')->name('ventas.valida');
Route::resource('/borrarVentas','App\Http\Controllers\BorrarVentasController')->names('borrarVentas');
Route::resource('/borrarLineas','App\Http\Controllers\BorrarLineasController')->names('borrarLineas');
Route::resource('/reporteGestionPoliza','App\Http\Controllers\ReporteGestionPolizaController')->names('reporteGestionPoliza');
Route::resource('/reporteGestionGral','App\Http\Controllers\ReporteGestionGralController')->names('reporteGestionGral');
Route::resource('/polizas','App\Http\Controllers\PolizasController')->names('polizas');

Route::post('/borrarV','App\Http\Controllers\BorrarVentasController@borrar')->name('borrarVentas.borrarV');
Route::post('/borrarL','App\Http\Controllers\BorrarLineasController@borrar')->name('borrarLineas.borrarL');

Route::get('excel/Reporte/{id}', 'App\Http\Controllers\ReporteGestionPolizaController@show')->name('downloadFile');


//Route::get('/ventaMostrar','App\Http\Controllers\VentasController')->name('ventas.ventaMostrar');
//Route::post('/borrarVenta','App\Http\Controllers\BorrarVentasController@borrarVenta')->name('borrarVenta');
//Route::post('/borrarLinea','App\Http\Controllers\BorrarLineasController@borrarLinea')->name('borrarLinea');
