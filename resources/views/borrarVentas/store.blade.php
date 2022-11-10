@extends('adminlte::page')

@section('title', 'Borrar Ventas')

@section('content_header')
    <h1>Borrar Ventas</h1>
@stop

@section('content')
    
	<div class="card-header">
		<h3 class="card-title">Borrar Ventas</h3>
	</div>
	<div class="card-body p-0" style="height: 500px;">
        @csrf
        {!! Form::open(['route'=>'borrarVentas.borrarV','method'=>'POST' ,'class'=>'form-inline']) !!}
        <div class="form-group col-md-2 mb-2">
        	<label for="date">Fecha</label>
	        <input type="text" class="form-control" name="date" id="date" value="{{$fecha}}" readonly>
	        <input type="hidden" class="form-control" name="idA" id="idA" value="{{$idA}}">
	    </div>
	    <div class="form-group col-md-2 mt-4 mb-2">
      		<center><input type="submit" value="Borrar Ventas" class="btn btn-primary"></center>
      	</div>
      	{!! Form::close()  !!}
        <div class="card-body table-responsive p-0" style="height: 500px;">
		<table class="table table-head-fixed"  id="tablaAsegurado">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th>Asegurado</th>
					<th>Deudor</th>
					<th>Factura</th>
					<th>Importe</th>
					<th>IVA</th>
					<th>Importe Total</th>
					<th>Moneda Factura</th>
					<th>Fecha Factura</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ventas as $venta)
				<tr>
					<td>{{$venta->id}}</td>
					<td>{{$venta->arz2}}</td>
					<td>{{$venta->arz3}}</td>
					<td>{{$venta->factura}}</td>
					<td>{{$venta->importe}}</td>
					<td>{{$venta->iva}}</td>
					<td>{{$venta->importeTotal}}</td>
					<td>{{$venta->monedaFactura}}</td>
					<td>{{$venta->fechaFactura}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
        
	</div>
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
@section('css')
	<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop