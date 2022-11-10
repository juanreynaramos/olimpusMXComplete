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
	{!! Form::label('direccion','Dirección') !!}
	{!! Form::text('direccion',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('rfc','RFC') !!}
	{!! Form::text('rfc',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('email','Correo Electrónico 1') !!}
	{!! Form::email('email',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('email2','Correo Electrónico 2') !!}
	{!! Form::email('email2',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('email3','Correo Electrónico 3') !!}
	{!! Form::email('email3',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('email4','Correo Electrónico 4') !!}
	{!! Form::email('email4',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
	<ul>
	    @foreach ($errors->get('valorSaldoEstimadoPromedio') as $error)
	        <li class="alert alert-warning list-unstyled">{{ $error }}</li>
	    @endforeach
	</ul>
	{!! Form::label('valorSaldoEstimadoPromedio','Valor Saldo Estimado Promedio') !!}
	{!! Form::number('valorSaldoEstimadoPromedio',null,['class'=>'form-control', 'step'=>'0.01']) !!}
</div>