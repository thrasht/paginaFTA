@extends ('layout')

@section ('content')

<section id="contenido">
	
	<div class="panel panel-default col-md-6 col-md-offset-3">
		<div class="panel-body">

		<p>{{ $message->name }}</p>
		<p>{{ $message->email }}</p>
		<p>{{ $message->subject }}</p>
		<p>{{ $message->created_at }}</p>
		<h3>Mensaje</h3>
		<p>{{ $message->message }}</p>
		
		@if ($message->reply)
		<h3>Respuesta</h3>
		<p>{{ $message->reply }}</p>

		@else
			{!! Form::open(['route' => ['contact.reply', 'id' => $message->id], 'method' => 'PUT']) !!}
				<div class="form-group">

					{!! Form::label('response', 'Responder') !!}
					{!! Form::textarea('message', null, array('class' => 'form-control', 'required' => 'required')) !!}

				</div>

				<button type="submit" class="btn btn-info">Enviar</button>
			{!! Form::close() !!}
		@endif
		</div>
	</div>

</section>

@stop