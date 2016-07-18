@extends ('layout')

@section ('content')

	<section id="contenido">
	@include('partials.message')

	<div class="panel panel-default col-md-6 col-md-offset-3">	
		<div class="panel-body">
			{!! Form::open(['route' => ['article.update', 'id' => $id], 'files' => true, 'method' => 'PUT']) !!}
				<div class="form-group">

					{!! Form::label('name', 'Nombre') !!}
					{!! Form::text('name', $art->name, array('class' => 'form-control', 'required' => 'required')) !!}

					{!! Form::label('cost', 'Precio') !!}
					{!! Form::text('cost', $art->cost, array('class' => 'form-control', 'required' => 'required')) !!}

					{!! Form::label('available', 'Inventario') !!}
					{!! Form::text('available', $art->available, array('class' => 'form-control', 'required' => 'required')) !!}

					{!! Form::label('description', 'Descripción') !!}
					{!! Form::textarea('description', $art->description, array('class' => 'form-control', 'required' => 'required')) !!}

					{!! Form::label('image', 'Imagen Actual') !!}
					<figure>
						<img src="{{ asset('articles/' . $art->image) }}">
					</figure>
					{!! Form::file('image', null) !!}

					<div class="botonEditP">
						{!! Form:: submit('Actualizar', ['class' => 'btn btn-info']) !!}
					</div>
		
				</div>
			{!! Form::close() !!}
		</div>
	</div>

	</section>

@stop