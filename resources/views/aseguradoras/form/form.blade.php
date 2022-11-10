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
	{!! Form::label('uri','Uri') !!}
	{!! Form::text('uri',null,['class'=>'form-control']) !!}
</div>