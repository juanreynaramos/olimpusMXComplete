@extends('adminlte::page')

@section('title', 'Aseguradoras')

@section('content_header')
    <h1>Subida</h1>
@stop

@section('content')
    
	<div class="card-header">
		<h3 class="card-title">Subida de Líneas</h3>
	</div>
	{!! Form::open(['route'=>'ventas.valida','method'=>'POST']) !!}
	<div class="card-body p-0" style="height: 500px;">
        @csrf
        <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert" >
	        Se importaron {{$numRows}} registros.<br>
	        Con un monto de ${{number_format($importeSoli, 2, '.', ',')}} de importe de compra.<br>
	        Con un monto de ${{number_format($iva, 2, '.', ',')}} de iva de compra.<br>
	        Con un monto de ${{number_format($importeTotalSoli, 2, '.', ',')}} de importe total de compra.<br>
	    </div>
        <div class="form-group col-md-6">
        	<label for="date">Fecha</label>
	        <input type="text" class="form-control" name="date" id="date" value="{{$fecha}}" readonly>
	        <input type="hidden" name="idA" id="idA" value="{{$idA}}">
	        <label for="ase">Asegurado</label>
	        <input type="text" class="form-control" name="ase" id="ase" value="{{$nameAse->razonSocial}}" readonly>
	    </div>
	    <div class="form-group col-md-6">
      		<center><input type="submit" value="Validar Archivo" class="btn btn-primary"></center>
      	</div>
      	@if($newDeudors>0 )
		<div class="card-body table-responsive p-0" style="height: 500px;">
		<h2>Relación de Deudores no existentes en Base </h2><a type="button" class="btn btn-outline-info btn-sm" href="{{route('ventas.index')}}"><h4>Volver a subir archivo</h4></a><br><br>
		<table class="table table-head-fixed">
			<thead>
				<tr>
					<th scope="col">ID subida</th>
					<th>Razón Social</th>
					<th>Identificador</th>
				</tr>
			</thead>
			<tbody>
				@foreach($arrayDeudor as $aDeudor)
				<tr>
					<td scope="now">{{$aDeudor->id}}</td>
					<td>{{$aDeudor->razonSocial}}</td>
					<td>{{$aDeudor->identificador}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@else
	 <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert" >
	 	Todos los deudores fueron encontrados en la base.
	 </div>
	@endif
	</div>
	
	{!! Form::close()  !!}
@stop

@section('css')
	<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
