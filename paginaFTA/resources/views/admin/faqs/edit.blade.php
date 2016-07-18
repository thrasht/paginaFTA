@extends ('layout')

@section ('content')

	<section id="contenido">
	@include('partials.message')

	<div class="panel panel-default col-md-6 col-md-offset-3">	
		<div class="panel-body">
			{!! Form::open(['route' => ['faq.update', 'id' => $faq->id], 'method' => 'PUT']) !!}
				<div class="form-group">

					{!! Form::label('question', 'Nombre') !!}
					{!! Form::text('question', $faq->question, array('class' => 'form-control', 'required' => 'required')) !!}

					{!! Form::label('answer', 'Respuesta') !!}
					{!! Form::text('answer', $faq->answer, array('class' => 'form-control', 'required' => 'required')) !!}


					<div class="botonEditP">
						{!! Form:: submit('Actualizar', ['class' => 'btn btn-info']) !!}
					</div>
		
				</div>
			{!! Form::close() !!}
		</div>
	</div>

	</section>

@stop