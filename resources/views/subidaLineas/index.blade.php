@extends('adminlte::page')

@section('title', 'Aseguradoras')

@section('content_header')
    <h1>Subida</h1>
@stop

@section('content')
        @if (isset($errors) && $errors->any() )
 
            <div class="alert alert-danger">
            	<ul>
	                @foreach( $errors->all() as $error )
	                	<li>{{ $error }}</li>
	                @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('failures'))
            <table class="table table-danger">
                <tr>
                    <th>Linea</th>
        			<th>Atributo</th>
        			<th>Error</th>
        			<th>Valor</th>
                </tr>

                @foreach (session()->get('failures') as $validation)
                    <tr>
                        <td>{{ $validation->row() }}</td>
                        <td>{{ $validation->attribute() }}</td>
                        <td>
                            <ul>
                                @foreach ($validation->errors() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            {{ $validation->values()[$validation->attribute()] }}
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
	<div class="card-header">
		<h3 class="card-title">Subida de Líneas</h3>
	</div>
	@if (session('info'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" >
        {{session('info')}}
        {{session()->forget('info')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
	{!! Form::open(['route'=>'subidaLineas.store','method'=>'POST','files' => true]) !!}
	<div class="card-body p-0" style="height: 500px;">
        @csrf
        <ul>
		    @foreach ($errors->get('date') as $error)
		        <li class="alert alert-warning list-unstyled">El campo fecha es necesario!!!
	        	<button type="button" class="close" data-dismiss="alert" aria-label="close">
	          	<span aria-hidden="true">&times;</span></li>
		    @endforeach
		</ul>
        <div class="form-group col-md-6">
        	<label for="date">Fecha</label>
	        	<input type="text" class="form-control" name="date" id="date">
	        </div>

        <div class="form-group col-md-6">
        	<label for="file">Archivo</label>
	        <input type="file" name="file" id="file" class="form-control-file">
	    </div>
        <ul>
		    @foreach ($errors->get('id') as $error)
		        <li class="alert alert-warning list-unstyled">{{ $error }}</li>
		    @endforeach
		</ul>

	    <div class="form-group col-md-6">
	        {!! Form::label('id','Aseguradora') !!}
	        <select class="form-control" name="id" id="id">
			    @foreach($aseguradoras as $aseguradora)
			      <option value="{{$aseguradora->id}}">{{$aseguradora->razonSocial}}</option>
			    @endforeach
			</select>
	    </div>
	    <div class="form-group col-md-6">
	        {!! Form::label('idA','Asegurado') !!}
	        <select class="form-control" name="idA" id="idA">
			    @foreach($asegurados as $asegurado)
			      <option value="{{$asegurado->id}}">{{$asegurado->razonSocial}}</option>
			    @endforeach
			</select>
	    </div>
	    <div class="form-group col-md-6">
      		<center><input type="submit" value="Subir Archivo" class="btn btn-primary"></center>
      	</div>
	</div>
	{!! Form::close()  !!}
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
clear: "Borrar",
format: 'yyyy-mm',
titleFormat: 'yyyy-mm', /* Leverages same syntax as 'format' */
weekStart: 0
};

</script>
<script type="text/javascript">
           $('#date').datepicker({
           autoclose: true,
	       format: 'yyyy-mm',
	       todayBtn: true,
	       language: 'es',
	       minViewMode: "months",
     });  
</script>

@stop
