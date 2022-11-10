@extends('adminlte::page')

@section('title', 'Aseguradoras')

@section('content_header')
    <h1>Asegurado</h1>
@stop

@section('content')
    <div class="card">
	<div class="card-header">
	  <h3 class="card-title">Ver de Asegurado</h3>
    </div>
	<div class="card-body ">
		<div class="form-group">
      {!! Form::label('razonSocial','Razon Social') !!}
      <input type="text" class="form-control" name="razonSocial" value="{{$asegurado->razonSocial}}" readonly>
    </div>    
    <div class="form-group">
      {!! Form::label('direccion','Dirección') !!}
      <input type="text" class="form-control" name="direccion" value="{{$asegurado->direccion}}" readonly>
    </div>
    <div class="form-group">
      {!! Form::label('rfc','RFC') !!}
      <input type="text" class="form-control" name="rfc" value="{{$asegurado->rfc}}" readonly>
    </div>
    <div class="form-group">
      {!! Form::label('email','Correo Electrónico 1') !!}
      <input type="text" class="form-control" name="email" value="{{$asegurado->email}}" readonly>
    </div>
    <div class="form-group">
      {!! Form::label('email2','Correo Electrónico 2') !!}
      <input type="text" class="form-control" name="email2" value="{{$asegurado->email2}}" readonly>
    </div>
    <div class="form-group">
      {!! Form::label('email3','Correo Electrónico 3') !!}
      <input type="text" class="form-control" name="email3" value="{{$asegurado->email3}}" readonly>
    </div>
    <div class="form-group">
      {!! Form::label('valorSaldoEstimadoPromedio','Valor Saldo Estimado Promedio') !!}
      <input type="text" class="form-control" name="valorSaldoEstimadoPromedio" value="{{$asegurado->valorSaldoEstimadoPromedio}}" readonly>
    </div>
	</div>
	<div class="card-footer">
      <a class="btn btn-danger float-right col-md-2 offset-md-1" href="{{route('asegurados.index')}}">Regresar</a>
      <a class="btn btn-info float-right col-md-2" href="{{route('asegurados.edit',$asegurado->id)}}">Editar</a>
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
