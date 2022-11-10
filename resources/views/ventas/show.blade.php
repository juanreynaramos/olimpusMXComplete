@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Ventas</h1>
@stop

@section('content')
    <div class="card">
	<div class="card-header">
	  <h3 class="card-title">Ver de ventas</h3>
  </div>
	<div class="card-body ">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          {!! Form::label('Asegurado','Asegurado') !!}
          <input type="text" class="form-control" name="Asegurado" value="{{$ventas->arz2}}" readonly>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          {!! Form::label('Deudor','Deudor') !!}
          <input type="text" class="form-control" name="Deudor" value="{{$ventas->arz3}}" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          {!! Form::label('factura','Factura') !!}
          <input type="text" class="form-control" name="factura" value="{{$ventas->factura}}" readonly>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          {!! Form::label('importe','Importe') !!}
          <input type="text" class="form-control" name="importe" value="{{$ventas->importe}}" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('iva','IVA') !!}
          <input type="text" class="form-control" name="iva" value="{{$ventas->iva}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('importeTotal','Importe Total') !!}
          <input type="text" class="form-control" name="importeTotal" value="{{$ventas->importeTotal}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('monedaFactura','Moneda Factura') !!}
          <input type="text" class="form-control" name="monedaFactura" value="{{$ventas->monedaFactura}}" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          {!! Form::label('fechaFactura','Fecha Factura') !!}
          <input type="text" class="form-control" name="fechaFactura" value="{{$ventas->fechaFactura}}" readonly>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          {!! Form::label('fechaVencimiento','Fecha Vencimiento') !!}
          <input type="text" class="form-control" name="fechaVencimiento" value="{{$ventas->fechaVencimiento}}" readonly>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('plazoCredito','Plazo Crédito') !!}
          <input type="text" class="form-control" name="plazoCredito" value="{{$ventas->plazoCredito}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('fechaPago','Fecha Pago') !!}
          <input type="text" class="form-control" name="fechaPago" value="{{$ventas->fechaPago}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('tipoFactura','Tipo Factura') !!}
          <input type="text" class="form-control" name="tipoFactura" value="{{$ventas->tipoFactura}}" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          {!! Form::label('estatusCliente','Estatus Cliente') !!}
          <input type="text" class="form-control" name="estatusCliente" value="{{$ventas->estatusCliente}}" readonly>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          {!! Form::label('mesyear','Año-Mes') !!}
          <input type="text" class="form-control" name="mesyear" value="{{str_replace('-01','',$ventas->mesyear)}}" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          {!! Form::label('destino','Destino') !!}
          <input type="text" class="form-control" name="destino" value="{{$ventas->destino}}" readonly>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          {!! Form::label('comentarios','Comentarios') !!}
          <input type="text" class="form-control" name="comentarios" value="{{$ventas->comentarios}}" readonly>
        </div>
      </div>
    </div>
  </div>
	<div class="card-footer">
      <a class="btn btn-danger float-right col-md-2 offset-md-1" href="{{route('ventas.create')}}">Regresar</a>
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
