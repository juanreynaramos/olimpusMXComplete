@extends('adminlte::page')

@section('title', 'Aseguradoras')

@section('content_header')
    <h1>Editar Aseguradoras</h1>
@stop

@section('content')
    <div class="card">
	<div class="card-header">
	  <h3 class="card-title">Edición de Aseguradoras</h3>
    </div>
    {!! Form::model($aseguradora, ['route'=>['aseguradoras.update',$aseguradora->id],'method'=>'PUT']) !!}
	<div class="card-body ">
		@include('aseguradoras.form.form')
	</div>
	<div class="card-footer">
      <a class="btn btn-danger float-right" href="{{route('aseguradoras.index')}}">Cancelar</a>
      <input type="submit" value="Actualizar" class="btn btn-primary">
    </div>
    {!! Form::close() !!}
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
