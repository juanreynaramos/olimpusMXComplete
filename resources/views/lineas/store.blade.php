@extends('adminlte::page')

@section('title', 'Aseguradoras')

@section('content_header')
    <h1>Subida</h1>
@stop

@section('content')
    
	<div class="card-header">
		<h3 class="card-title">Validación de Líneas</h3>
	</div>
	<div class="card-body p-0" style="height: 500px;">
        @csrf
        @if ($contadorLineas > 0 || $contadorNewDeudor > 0 )
	        <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert" >
	        	@if ($contadorLineas > 0 )
	        		<h3>Se han guardado un total de {{$contadorLineas}} líneas.</h3>
	        	@endif
		        @if ($contadorNewDeudor > 0 )
	        		<h3>Se han guardado un total de {{$contadorNewDeudor}} de nuevos deudores.</h3>
	        	@endif
		    </div>
	    @endif
	    @if ($contadorLineasDuplicadas > 0 )
	         <div class="alert alert-danger w-50 ">
	         	<h5>Se han duplicado {{$contadorLineasDuplicadas}} ventas que no se insertaron.</h5>
	         </div>
	    @endif
        <div class="form-group col-md-6">
        	<label for="date">Fecha</label>
	        <input type="text" class="form-control" name="date" id="date" value="{{$fecha}}" readonly>
	    </div>
	    <div class="form-group col-md-6">
      		<center>
      <a class="btn btn-success float-right" href="{{route('subidaLineas.index')}}">Subir líneas</a></center>
      	</div>
	</div>
@stop

@section('css')
	<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
