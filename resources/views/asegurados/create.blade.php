@extends('adminlte::page')

@section('title', 'Agregar Asegurado')

@section('content_header')
    <h1>Asegurados</h1>
@stop

@section('content')
    <div class="card">
	<div class="card-header">
		<h3 class="card-title">Registro de Asegurados</h3>
	</div>
	{!! Form::open(['route'=>'asegurados.store','method'=>'POST']) !!}
	<div class="card-body">
		@include('asegurados.form.form')
	</div>
	<div class="card-footer">
		<a class="btn btn-danger float-right" href="{{route('asegurados.index')}}">Cancelar</a>
		<input type="submit" value="Guardar" class="btn btn-primary">
	</div>
	{!! Form::close()  !!}
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
