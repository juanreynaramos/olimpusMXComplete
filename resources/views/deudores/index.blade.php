@extends('adminlte::page')

@section('title', 'Deudores')

@section('content_header')
    <h1>Deudores</h1>
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
		<div class="card-tools">
			<a type="button" class="btn btn-tool" href="{{route('deudores.create')}}"><h3>Agregar <li class="fas fa-plus"></li></h3></a>
		</div>
	</div>
	<div class="card-body table-responsive p-0" style="height: 500px; margin-top: 15px;">
		<table class="table table-head-fixed" id="tablaDeudor">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th>Razón Social</th>
					<th>RFC</th>
					<th>Dun & Bradstreet</th>
					<th>País</th>
					<th ></th>
				</tr>
			</thead>
			<tbody>
				@foreach($deudores as $deudor)
				<tr>
					<td scope="now">{{$deudor->id}}</td>
					<td>{{$deudor->razonSocial}}</td>
					<td>{{$deudor->rfc}}</td>
					<td>{{$deudor->dun}}</td>
					<td>{{$deudor->pais}}</td>
					<td width="10px">
						<div class="btn-group">
							<a class="btn btn-info mx-1" href="{{route('deudores.edit',$deudor->id)}}"><li class="fas fa-edit"></li></a>
							<a class="btn btn-info mx-1" href="{{route('deudores.show',$deudor->id)}}"><i class="fas fa-eye"></i></li></a>
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
	    $('#tablaDeudor').DataTable(
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
