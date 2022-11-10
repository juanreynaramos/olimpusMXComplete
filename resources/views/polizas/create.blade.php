@extends('adminlte::page')

@section('title', 'Crear Póliza')

@section('content_header')
    <h1>Pólizas</h1>
@stop

@section('content')
    <div class="card">
	<div class="card-header">
		<h3 class="card-title">Registro de Pólizas</h3>
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
	{!! Form::open(['route'=>'polizas.store','method'=>'POST']) !!}
	<div class="card-body">
		@include('polizas.form.form')
	</div>
	<div class="card-footer">
		<input type="submit" value="Guardar" class="btn btn-primary">
		<a class="btn btn-danger float-right" href="{{route('polizas.index')}}">Cancelar</a>
	</div>
	{!! Form::close()  !!}
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
@stop

@section('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
 <script>
 $.fn.datepicker.dates['es'] = {
days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sá"],
months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
today: "Hoy",
clear: "Borrar", /* Leverages same syntax as 'format' */
weekStart: 0
};

</script>
<script type="text/javascript">
$('.inicioVigencia').datepicker({
   autoclose: true,
   format: 'yyyy-mm-dd',
   language: 'es',
});  
$('.finVigencia').datepicker({
   autoclose: true,
   format: 'yyyy-mm-dd',
   language: 'es',
});  
</script>
@stop
