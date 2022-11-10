@extends('adminlte::page')

@section('title', 'Borrar Líneas')

@section('content_header')
    <h1>Borrar Líneas</h1>
@stop

@section('content')
    
	<div class="card-header">
		<h3 class="card-title">Borrar Líneas</h3>
	</div>
	<div class="card-body p-0" style="height: 500px;">
        @csrf
        <div class="alert alert-success alert-dismissible col-md-6" role="alert" >
	        Se borraron {{$numRows}} registros.<br>
	        Con un monto de ${{number_format($importeSoli, 2, '.', ',')}} de importe solicitado.<br>
	        Con un monto de ${{number_format($importeTotalSoli, 2, '.', ',')}} de importe asegurado.<br>
	    </div>
        <div class="form-group col-md-6">
        	<label for="date">Fecha</label>
	        <input type="text" class="form-control" name="date" id="date" value="{{$fecha}}" readonly>
	        <input type="hidden" name="idA" id="idA" value="{{$idA}}">
	        <label for="ase">Aseguradora</label>
	        <input type="text" class="form-control" name="ase" id="ase" value="{{$aseguradora->razonSocial}}" readonly>
	        <label for="ase">Asegurado</label>
	        <input type="text" class="form-control" name="ase" id="ase" value="{{$asegurado->razonSocial}}" readonly>
	    </div>
	</div>
@stop

@section('css')
	<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
