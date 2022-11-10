@extends('adminlte::page')

@section('title', 'Aseguradoras')

@section('content_header')
    <h1>Editar Asegurados</h1>
@stop

@section('content')
@if ($errors->any())
  <ul>x|
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="card">
	<div class="card-header">
	  <h3 class="card-title">Edición de Asegurados</h3>
    </div>
    {!! Form::model($asegurado, ['route'=>['asegurados.update',$asegurado->id],'method'=>'PUT']) !!}
	<div class="card-body ">
		@include('asegurados.form.form')
	</div>
	<div class="card-footer">
      <a class="btn btn-danger float-right" href="{{route('asegurados.index')}}">Cancelar</a>
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
