@extends ('layout')

@section ('content')

	<section id="contenido">
	@include('partials.message')

	<div class="panel panel-default col-md-6 col-md-offset-3">	
		<div class="panel-body">
			{!! Form::open(['route' => ['article.store', 'type' => $type], 'files' => true, 'method' => 'POST']) !!}
				<div class="form-group">

					{!! Form::label('name', 'Nombre') !!}
					{!! Form::text('name', null, array('class' => 'form-control', 'required' => 'required')) !!}

					{!! Form::label('cost', 'Precio') !!}
					{!! Form::text('cost', null, array('class' => 'form-control', 'required' => 'required')) !!}

					{!! Form::label('available', 'Inventario') !!}
					{!! Form::text('available', null, array('class' => 'form-control', 'required' => 'required')) !!}

					{!! Form::label('description', 'Descripción') !!}
					{!! Form::textarea('description', null, array('class' => 'form-control', 'required' => 'required')) !!}

					{!! Form::file('image', null) !!}
					
					<div class="botonEditP">
						{!! Form:: submit('Agregar', ['class' => 'btn btn-success']) !!}
					</div>
		
				</div>
			{!! Form::close() !!}
		</div>
	</div>

	</section>

@stop