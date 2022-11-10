@extends('adminlte::page')

@section('title', 'Reporte de Gestión')

@section('content_header')
    <h1>Pólizas</h1>
@stop

@section('content')
    <div class="card">
	<div class="card-header">
		<h3 class="card-title">Reporte de Gestión</h3>
	</div>
	@if ($errors->any())
	<div class="alert alert-warning alert-dismissible fade show" role="alert" >
		<button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
	  <ul>
	    @foreach ($errors->all() as $error)
	        <li>{{ $error }}</li>
	    @endforeach
	  </ul>
	</div>
@endif
	<div class="card-body">
		<div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <div class="card">
                <div class="card-body">
                    <br>
                    <br>
                    <center><h2><strong>{{ $archivo }}</strong></h2></center><br>
                    <br>
                    <br>
                     <center><a href="{{ route('downloadFile',$lin) }}" class="btn btn-primary">Descargar Reporte</a></center>
                    <br>
               </div>
            </div>
        </div>
    </div>
	</div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@stop
