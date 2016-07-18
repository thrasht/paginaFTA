@extends ('layout')

@section ('content')

	<section id="contenido">
	
	@include('partials.message')

	@include('partials.menuProfile')
		
		<div class="contenidoPerfil">
				<div class="panel-body">
					{!! Form::open(['route' => 'profile.edit', 'method' => 'PUT']) !!}
						<div class="form-group">
							{!! Form::label('full_name', 'Nombre completo') !!}
							{!! Form::text('full_name', Auth::user()->full_name, array('class' => 'form-control', 'required' => 'required')) !!}

							{!! Form::label('user', 'Nombre de usuario') !!}
							{!! Form::text('user', Auth::user()->user, array('class' => 'form-control', 'required' => 'required')) !!}

							{!! Form::label('email', 'Correo') !!}
							{!! Form::email('email', Auth::user()->email, array('class' => 'form-control', 'required' => 'required')) !!}

							<!-- {!! Form::label('password', 'Contraseña') !!}
							{!! Form::password('password', array('class' => 'form-control', 'required' => 'required')) !!}

							{!! Form::label('password_confirmation', 'Confirmar contraseña') !!}
							{!! Form::password('password_confirmation', array('class' => 'form-control', 'required' => 'required')) !!} -->
						</div>

						<button type="submit" class="btn btn-info">Actualizar</button>
					{!! Form::close() !!}
				</div>


		</div>

	</section>

@stop