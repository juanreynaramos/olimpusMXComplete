@extends('adminlte::page')

@section('title', 'Asegurados')

@section('content_header')
    <h1>Asegurados</h1>
@stop

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
     @if (session('info'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" >
        {{session('info')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
	<div class="card-header">
		<h3 class="card-title">Sección de Asegurados</h3>
		<div class="card-tools">
			<a type="button" class="btn btn-tool" href="{{route('asegurados.create')}}"><h3>Agregar <li class="fas fa-plus"></li></h3></a>
		</div>
	</div>
	<div class="mb-2 mt-2">
	{!! Form::open(['route'=>'razonSocial','method'=>'post','class'=>'form-inline']) !!}
		<select name="razonSocial" class="form-control form-control-sm ml-2 ">
			@foreach($aseguradosRZ as $aseguradoRZ)
				<option value="{{$aseguradoRZ->id}}">{{$aseguradoRZ->razonSocial}}</option>
			@endforeach
		</select>
		<button type="submit" class="form-control form-control-sm sm ml-1"><i class="fas fa-search"></i></button>
</div>
	{!! Form::close() !!}
	<div class="card-body table-responsive p-0" style="height: 500px;">
		<table class="table table-head-fixed"  id="tablaAsegurado">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th>Razón Social</th>
					<th>RFC</th>
					<th>Dirección</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($asegurados as $asegurado)
				<tr>
					<td scope="now">{{$asegurado->id}}</td>
					<td>{{$asegurado->razonSocial}}</td>
					<td>{{$asegurado->rfc}}</td>
					<td>{{$asegurado->direccion}}</td>
					<td width="10px">
						<div class="btn-group">
							<a class="btn btn-info mx-1" href="{{route('asegurados.edit',$asegurado->id)}}"><li class="fas fa-edit"></li></a>
							<a class="btn btn-info mx-1" href="{{route('asegurados.show',$asegurado->id)}}"><i class="fas fa-eye"></i></li></a>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style >
    	nav svg{
    		max-height: 20px;
    		max-width: 25px;
    	}
    </style>
@stop
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
	    $('#tablaAsegurado').DataTable(
	    	{
	    		"language": {
				    "sProcessing":     "Procesando...",
				    "sLengthMenu":     "Mostrar _MENU_ registros",
				    "sZeroRecords":    "No se encontraron resultados",
				    "sEmptyTable":     "Ningún dato disponible en esta tabla",
				    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				    "sSearch":         "Buscar:",
				    "sInfoThousands":  ",",
				    "sLoadingRecords": "Cargando...",
				    "oPaginate": {
				        "sFirst":    "Primero",
				        "sLast":     "Último",
				        "sNext":     "Siguiente",
				        "sPrevious": "Anterior"
				    },
				    "oAria": {
				        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
				    },
				    "buttons": {
				        "copy": "Copiar",
				        "colvis": "Visibilidad"
				    }
				}
	    	});
	} );
</script>
@section('js')

@stop
