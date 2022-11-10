@extends('adminlte::page')

@section('title', 'Aseguradoras')

@section('content_header')
    <h1>Deudor</h1>
@stop

@section('content')
    <div class="card">
	<div class="card-header">
	  <h3 class="card-title">Ver de Deudor</h3>
    </div>
	<div class="card-body ">
		<div class="form-group">
      {!! Form::label('razonSocial','Razon Social') !!}
      <input type="text" class="form-control" name="razonSocial" value="{{$deudor->razonSocial}}" readonly>
    </div>
    <div class="form-group">
      {!! Form::label('rfc','RFC') !!}
      <input type="text" class="form-control" name="rfc" value="{{$deudor->rfc}}" readonly>
    </div>
    <div class="form-group">
      {!! Form::label('pais','Pais') !!}
      <input type="text" class="form-control" name="pais" value="{{$deudor->pais}}" readonly>
    </div>
    <div class="form-group">
      {!! Form::label('ciudad','Ciudad') !!}
      <input type="text" class="form-control" name="ciudad" value="{{$deudor->ciudad}}" readonly>

    </div>
    <div class="form-group">
      {!! Form::label('poblacion','Población') !!}
      <input type="text" class="form-control" name="poblacion" value="{{$deudor->poblacion}}" readonly>
    </div>
    <div class="form-group">
      {!! Form::label('codigoPais','Codigo País') !!}
      <input type="text" class="form-control" name="codigoPais" value="{{$deudor->codigoPais}}" readonly>
    </div>
    <div class="form-group">
      {!! Form::label('estadoProvincia','Estado o Provincia') !!}
      <input type="text" class="form-control" name="estadoProvincia" value="{{$deudor->estadoProvincia}}" readonly>
    </div>
    <div class="form-group">
      {!! Form::label('direccion','Dirección') !!}
      <input type="text" class="form-control" name="direccion" value="{{$deudor->direccion}}" readonly>
    </div>
    <div class="form-group">
      {!! Form::label('cp','Código Postal') !!}
      <input type="text" class="form-control" name="cp" value="{{$deudor->cp}}" readonly>
    </div>
    <div class="form-group">
      {!! Form::label('claveCliente','Clave Cliente') !!}
      <input type="text" class="form-control" name="claveCliente" value="{{$deudor->claveCliente}}" readonly>
    </div>
    <div class="form-group">
      {!! Form::label('duns','Dun & Bradstreet') !!}
      <input type="text" class="form-control" name="poblacion" value="{{$deudor->duns}}" readonly>
    </div>
    <div class="form-group">
      {!! Form::label('giro','Giro del Comercio') !!}
      <input type="text" class="form-control" name="poblacion" value="{{$deudor->giro}}" readonly>
    </div>
    <div class="form-group">
      {!! Form::label('descripcionGiro','Descripción del Giro') !!}
      <input type="text" class="form-control" name="poblacion" value="{{$deudor->descripcionGiro}}" readonly>
    </div>
	</div>
	<div class="card-footer">
      <a class="btn btn-danger float-right col-md-2 offset-md-1" href="{{route('deudores.index')}}">Regresar</a>
      <a class="btn btn-info float-right col-md-2" href="{{route('deudores.edit',$deudor->id)}}">Editar</a>
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
