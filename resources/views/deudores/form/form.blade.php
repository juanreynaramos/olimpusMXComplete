<div class="form-group">
	<ul>
	    @foreach ($errors->get('razonSocial') as $error)
	        <li class="alert alert-warning list-unstyled">{{ $error }}</li>
	    @endforeach
	</ul>
	{!! Form::label('razonSocial','Razon Social') !!}
	{!! Form::text('razonSocial',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('rfc','RFC') !!}
	{!! Form::text('rfc',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('pais','Pais') !!}
	{!! Form::text('pais',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('ciudad','Ciudad') !!}
	{!! Form::text('ciudad',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('poblacion','Población') !!}
	{!! Form::text('poblacion',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('codigoPais','Codigo País') !!}
	{!! Form::select('codigoPais',getPaisesArray(),null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('estadoProvincia','Estado o Provincia') !!}
	{!! Form::text('estadoProvincia',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('direccion','Dirección') !!}
	{!! Form::text('direccion',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('cp','Código Postal') !!}
	{!! Form::text('cp',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('claveCliente','Clave Cliente') !!}
	{!! Form::text('claveCliente',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('duns','Dun & Bradstreet') !!}
	{!! Form::text('duns',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('giro','Giro del Comercio') !!}
	{!! Form::text('giro',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('descripcionGiro','Descripción del Giro') !!}
	{!! Form::text('descripcionGiro',null,['class'=>'form-control']) !!}
</div>