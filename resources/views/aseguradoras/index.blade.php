@extends('adminlte::page')

@section('title', 'Aseguradoras')

@section('content_header')
    <h1>Aseguradoras</h1>
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
		<h3 class="card-title">Sección de Aseguradoras</h3>
		<div class="card-tools">
			<a type="button" class="btn btn-tool" href="{{route('aseguradoras.create')}}"><h3>Agregar <li class="fas fa-plus"></li></h3></a>
		</div>
	</div>
	<div class="card-body table-responsive p-0" style="height: 500px;">
		<table class="table table-head-fixed">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th>Razón Social</th>
					<th>Uri</th>
					<th>Fecha de creación</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($aseguradoras as $aseguradora)
				<tr>
					<td scope="now">{{$aseguradora->id}}</td>
					<td>{{$aseguradora->razonSocial}}</td>
					<td>{{$aseguradora->uri}}</td>
					<td>{{$aseguradora->created_at}}</td>
					<td width="10px">
						<a class="btn btn-info" href="{{route('aseguradoras.edit',$aseguradora->id)}}"><li class="fas fa-edit"></li></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
			{{$aseguradoras->links()}}
	</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
