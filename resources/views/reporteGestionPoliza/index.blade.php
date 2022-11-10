@extends('adminlte::page')

@section('title', 'Gestión')

@section('content_header')
    <h1>Reporte de Gestión</h1>
@stop

@section('content')
    @if (session('info'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" >
        {{session('info')}}
        {{session()->forget('info')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
	<div class="card-header">
		<h3 class="card-title">Reporte de Gestión Póliza</h3>
	</div>
	{!! Form::open(['route'=>'reporteGestionPoliza.store','method'=>'POST']) !!}
	<div class="card-body p-0" style="height: 500px;">
        @csrf
	    <div class="form-group col-md-6">
	        {!! Form::label('idA','Asegurado') !!}
	        <select class="form-control" name="idA" id="idA">
			    @foreach($polizas as $poliza)
			      <option value="{{$poliza->id}}">{{$poliza->arz}}-{{$poliza->poliza}}</option>
			    @endforeach
			</select>
	    </div>
	    <div class="form-group col-md-6">
      		<center><input type="submit" value="Crear Póliza" class="btn btn-primary"></center>
      	</div>
	</div>
	{!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
