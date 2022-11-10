@extends('adminlte::page')

@section('title', 'Aseguradoras')

@section('content_header')
    <h1>Editar Asegurados</h1>
@stop

@section('content')
@if ($errors->any())
  <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif
    <div class="card">
	<div class="card-header">
	  <h3 class="card-title">Edición de Deudores</h3>
    </div>
    {!! Form::model($deudor, ['route'=>['deudores.update',$deudor->id],'method'=>'PUT']) !!}
	<div class="card-body ">
		@include('deudores.form.form')
	</div>
	<div class="card-footer">
      <a class="btn btn-danger float-right" href="{{route('deudores.index')}}">Cancelar</a>
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
