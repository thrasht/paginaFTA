@extends ('layout')

@section ('content')

	<section id="contenido">
	
	@include('partials.message')
	
	@include('partials.menuProfile')

		<div class="contenidoPerfil">

			<div class="panel-body">
				{!! Form::open(['route' => ['profile.address.edit', 'id' => Auth::user()->id], 'class' => 'form-group', 'method' => 'PUT']) !!}
					<div class="form-group">
						{!! Form::label('street', 'Calle', ['class' => 'control-label']) !!}
						{!! Form::text('street', $user->street, ['class' => 'form-control']) !!}
					</div>

					<div class="form-group form-inline">
						{!! Form::label('number', 'Número', ['class' => 'control-label']) !!}
						{!! Form::text('number', $user->number, ['class' => 'form-control']) !!}

						{!! Form::label('zipcode', 'CP', ['class' => 'control-label']) !!}
						{!! Form::text('zipcode', $user->zipcode, ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('city', 'Ciudad') !!}
						{!! Form::text('city', $user->city, ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('state', 'Estado') !!}
						{!! Form::text('state', $user->state, ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('phone', 'Teléfono') !!}
						{!! Form::text('phone', $user->phone, ['class' => 'form-control']) !!}
					</div>
					
					<div class="botonEditP">
						{!! Form::submit('Guardar', ['class' => 'btn']) !!}
					</div>
					
				{!! Form::close() !!}
			</div>
		</div>

	</section>

@stop