@extends('adminlte::page')

@section('title', 'Líneas')

@section('content_header')
    <h1>Líneas</h1>
@stop

@section('content')
    <div class="card">
	<div class="card-header">
	  <h3 class="card-title">Ver de Línea</h3>
    </div>
	<div class="card-body ">
    <div class="row">
      <div class="col-sm-6">
    		<div class="form-group">
          {!! Form::label('razonSocial','Aseguradora') !!}
          <input type="text" class="form-control" name="razonSocial" value="{{$lineas->arz}}" readonly>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          {!! Form::label('Asegurado','Asegurado') !!}
          <input type="text" class="form-control" name="Asegurado" value="{{$lineas->arz2}}" readonly>
        </div>
      </div>
    </div>
    <div class="form-group">
      {!! Form::label('Deudor','Deudor') !!}
      <input type="text" class="form-control" name="Deudor" value="{{$lineas->arz3}}" readonly>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('fechaSolicitud','Fecha Solicitud') !!}
          <input type="text" class="form-control" name="fechaSolicitud" value="{{$lineas->fechaSolicitud}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('importeSolicitado','Importe Solicitado') !!}
          <input type="text" class="form-control" name="importeSolicitado" value="{{$lineas->importeSolicitado}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('importeAsegurado','Importe Asegurado') !!}
          <input type="text" class="form-control" name="importeAsegurado" value="{{$lineas->importeAsegurado}}" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          {!! Form::label('decision','Decisión') !!}
          <input type="text" class="form-control" name="decision" value="{{$lineas->decision}}" readonly>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          {!! Form::label('tipoDesicion','Tipo Desición') !!}
          <input type="text" class="form-control" name="tipoDesicion" value="{{$lineas->tipoDesicion}}" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('fechaEfecto','Fecha Efecto') !!}
          <input type="text" class="form-control" name="fechaEfecto" value="{{$lineas->fechaEfecto}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('fechaVencimiento','Fecha Vencimiento') !!}
          <input type="text" class="form-control" name="fechaVencimiento" value="{{$lineas->fechaVencimiento}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('fechaAnulacion','Fecha Anulacion') !!}
          <input type="text" class="form-control" name="fechaAnulacion" value="{{$lineas->fechaAnulacion}}" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2">
        <div class="form-group">
          {!! Form::label('divisaSolicitada','Divisa Solicitada') !!}
          <input type="text" class="form-control" name="divisaSolicitada" value="{{$lineas->divisaSolicitada}}" readonly>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          {!! Form::label('divisaAsegurada','Divisa Asegurada') !!}
          <input type="text" class="form-control" name="divisaAsegurada" value="{{$lineas->divisaAsegurada}}" readonly>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="form-group">
          {!! Form::label('desicion1','Desición 1') !!}
          <input type="text" class="form-control" name="desicion1" value="{{$lineas->desicion1}}" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          {!! Form::label('desicion2','Desición 2') !!}
          <input type="text" class="form-control" name="desicion2" value="{{$lineas->desicion2}}" readonly>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          {!! Form::label('desicion3','Desición 3') !!}
          <input type="text" class="form-control" name="desicion3" value="{{$lineas->desicion3}}" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('importeVentasAnual','Importe Ventas Anual') !!}
          <input type="text" class="form-control" name="importeVentasAnual" value="{{$lineas->importeVentasAnual}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('condicionesPagoSolicitado','Condiciones Pago Solicitado') !!}
          <input type="text" class="form-control" name="condicionesPagoSolicitado" value="{{$lineas->condicionesPagoSolicitado}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('causaId','Causa Id') !!}
          <input type="text" class="form-control" name="causaId" value="{{$lineas->causaId}}" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('rating','Rating') !!}
          <input type="text" class="form-control" name="rating" value="{{$lineas->rating}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('ratingAnterior','Rating Anterior') !!}
          <input type="text" class="form-control" name="ratingAnterior" value="{{$lineas->ratingAnterior}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('mesyear','Año-Mes') !!}
          <input type="text" class="form-control" name="mesyear" value="{{str_replace('-01','',$lineas->mesyear)}}" readonly>
        </div>
      </div>
    </div>
	</div>
	<div class="card-footer">
      <a class="btn btn-danger float-right col-md-2 offset-md-1" href="{{route('lineas.index')}}">Regresar</a>
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
