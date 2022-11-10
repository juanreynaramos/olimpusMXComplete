@extends('adminlte::page')

@section('title', 'Líneas')

@section('content_header')
    <h1>Líneas</h1>
@stop

@section('content')
   
	<div class="card-header">
		<h3 class="card-title">Sección de Líneas</h3>
		<div class="card-tools">
			<a type="button" class="btn btn-tool" href="{{route('subidaLineas.index')}}"><h3>Agregar <li class="fas fa-plus"></li></h3></a>
		</div>
	</div>
	<div class="card-body table-responsive p-0" style="height: 500px;">
		<table class="table table-head-fixed"  id="tablaAsegurado">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th>Aseguradora</th>
					<th>Asegurado</th>
					<th>Deudor</th>
					<th>Fecha Solicitud</th>
					<th>Importe Solicitado</th>
					<th>Importe Asegurado</th>
					<th>Fecha Efecto</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($lineas as $linea)
				<tr>
					<td>{{$linea->id}}</td>
					<td>{{$linea->arz}}</td>
					<td>{{$linea->arz2}}</td>
					<td>{{$linea->arz3}}</td>
					<td>{{$linea->fechaSolicitud}}</td>
					<td>{{$linea->importeSolicitado}}</td>
					<td>{{$linea->importeAsegurado}}</td>
					<td>{{$linea->fechaEfecto}}</td>
					<td width="10px">
						<a class="btn btn-info mx-1" href="{{route('lineas.show',$linea->id)}}"><i class="fas fa-eye"></i></li></a>
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
