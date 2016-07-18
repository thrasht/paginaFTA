@extends ('layout')

@section ('content')

	<section id="contenido">

	<div class="panel panel-default col-md-6 col-md-offset-3">	
		<div class="panel-body">
			{!! Form::open(['route' => ['faq.store'], 'method' => 'POST']) !!}
				<div class="form-group">

					{!! Form::label('question', 'Nombre') !!}
					{!! Form::text('question', null, array('class' => 'form-control', 'required' => 'required')) !!}

					{!! Form::label('answer', 'Precio') !!}
					{!! Form::text('answer', null, array('class' => 'form-control', 'required' => 'required')) !!}


					<div class="botonEditP">
						{!! Form:: submit('Agregar', ['class' => 'btn btn-success']) !!}
					</div>
		
				</div>
			{!! Form::close() !!}
		</div>
	</div>

	</section>

@stop