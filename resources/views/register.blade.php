@extends('layout')

@section('content')

	<section id="contenido">
		<article class="contenido_form">
			<div class="tituloContacto">Únete hoy</div>
			
			@include('errors.error_message')

			<div class="panel panel-default col-md-6 col-md-offset-3">
				<div class="panel-body">
					{!! Form::open(['route' => 'user.store', 'method' => 'POST']) !!}
						<div class="form-group">
							{!! Form::label('full_name', 'Nombre completo') !!}
							{!! Form::text('full_name', null, array('class' => 'form-control', 'required' => 'required')) !!}

							{!! Form::label('user', 'Nombre de usuario') !!}
							{!! Form::text('user', null, array('class' => 'form-control', 'required' => 'required')) !!}

							{!! Form::label('email', 'Correo') !!}
							{!! Form::email('email', null, array('class' => 'form-control', 'required' => 'required')) !!}

							{!! Form::label('password', 'Contraseña') !!}
							{!! Form::password('password', array('class' => 'form-control', 'required' => 'required')) !!}

							{!! Form::label('password_confirmation', 'Confirmar contraseña') !!}
							{!! Form::password('password_confirmation', array('class' => 'form-control', 'required' => 'required')) !!}
						</div>

						<button type="submit" class="btn btn-info">Regístrate</button>
					{!! Form::close() !!}
				</div>
			</div>

		</article>
		
	</section>

@stop