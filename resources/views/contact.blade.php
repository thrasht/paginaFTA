@extends ('layout')

@section ('content')

	<section id="contenido">
		<article class="contenido_form">
			<div class="tituloContacto">¿Dudas?</div>
			<div class="textoContacto">Mándanos un mensaje o comunícate con nosotros, con gusto te atenderemos.</div>

			@include('errors.error_message')

			<div class="panel panel-default col-md-6 col-md-offset-3">
				<div class="panel-body">
					{!! Form::open(['route' => 'contact.store', 'method' => 'POST']) !!}
						<div class="form-group">
							{!! Form::label('name', 'Nombre') !!}
							{!! Form::text('name', null, array('class' => 'form-control', 'required' => 'required')) !!}

							{!! Form::label('email', 'Correo') !!}
							{!! Form::email('email', null, array('class' => 'form-control', 'required' => 'required')) !!}

							{!! Form::label('subject', 'Asunto') !!}
							{!! Form::text('subject', null, array('class' => 'form-control', 'required' => 'required')) !!}

							{!! Form::label('smessage', 'Mensaje') !!}
							{!! Form::textarea('message', null, array('class' => 'form-control', 'required' => 'required')) !!}

						</div>

						<button type="submit" class="btn btn-info">Enviar</button>
					{!! Form::close() !!}
				</div>
			</div>

		</article>
		
	</section>


@stop