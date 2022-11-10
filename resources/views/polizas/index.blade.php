@extends('adminlte::page')

@section('title', 'Polizas')

@section('content_header')
    <h1>Polizas</h1>
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
		<h3 class="card-title">Sección de Polizas</h3>
		<div class="card-tools">
			<a type="button" class="btn btn-tool" href="{{route('polizas.create')}}"><h3>Agregar <li class="fas fa-plus"></li></h3></a>
		</div>
	</div>
	<div class="card-body table-responsive p-0" style="height: 500px;">
		<table class="table table-head-fixed"  id="tablaPoliza">
			<thead>
				<tr>
					<th>Id</th>
					<th>Aseguradora</th>
					<th>Asegurado</th>
					<th>Poliza</th>
					<th>Fecha Inicio</th>
					<th>Fecha Vencimiento</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($polizas as $poliza)
				<tr>
					<td scope="now">{{$poliza->id}}</td>
					<td >{{$poliza->arz}}</td>
					<td>{{$poliza->arz2}}</td>
					<td>{{$poliza->poliza}}</td>
					<td>{{$poliza->inicioVigencia}}</td>
					<td>{{$poliza->finVigencia}}</td>
					<td width="10px">
						<div class="btn-group">
							<a class="btn btn-info mx-1" href="{{route('polizas.edit',$poliza->id)}}"><li class="fas fa-edit"></li></a>
							<a class="btn btn-info mx-1" href="{{route('polizas.show',$poliza->id)}}"><i class="fas fa-eye"></i></li></a>
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
	    $('#tablaPoliza').DataTable(
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
