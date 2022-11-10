@extends('adminlte::page')

@section('title', 'Aseguradoras')

@section('content_header')
    <h1>Subida</h1>
@stop

@section('content')
    
	<div class="card-header">
		<h3 class="card-title">Subida de Líneas</h3>
	</div>
	{!! Form::open(['route'=>'lineas.store','method'=>'POST']) !!}
	<div class="card-body p-0" style="height: 500px;">
        @csrf
        <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert" >
	        Se importaron {{$numRows}} registros.<br>
	        Con un monto de ${{number_format($importeSoli, 2, '.', ',')}} de importe solicitado límites de crédito.<br>
	        Con un monto de ${{number_format($importeTotalSoli, 2, '.', ',')}} de importe total de la decisión de límite de crédito.<br>
	        Con moneda base del archivo en {{$monedaUsuario}}({{$codigoMonedaUsuario}}).
	    </div>
        <div class="form-group col-md-6">
        	<label for="date">Fecha</label>
	        <input type="text" class="form-control" name="date" id="date" value="{{$fecha}}" readonly>
	        <input type="hidden" name="id" id="id" value="{{$id}}">
	        <input type="hidden" name="idA" id="idA" value="{{$idA}}">
	        <label for="ase">Aseguradora</label>
	        <input type="text" class="form-control" name="ase" id="ase" value="{{$nameAse->razonSocial}}" readonly>
	    </div>
	    <div class="form-group col-md-6">
      		<center><input type="submit" value="Validar Archivo" class="btn btn-primary"></center>
      	</div>
	</div>
	{!! Form::close()  !!}
@stop

@section('css')
	<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
