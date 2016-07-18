@extends ('layout')

@section ('content')

	<section id="contenido">

		@include('partials.message')

		<div class="panel panel-default">
		<div class="panel-body">
			<h3>Agregar imagen al banner</h3>
		{!! Form::open(['route' => 'banner.add', 'files' => true, 'class' => 'form-group', 'method' => 'POST']) !!}

			{!! Form::label('description', 'Descripción') !!}
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}

			{!! Form::file('imagen', null) !!}

			{!! Form::submit('Subir', ['class' => 'btn btn-success']) !!}

		{!! Form::close() !!}

		</div>
		</div>


    
	    @foreach($banner as $ban)
	    <div class="editarBanner">
			<img src="{{ asset('banner/' . $ban->imagen) }}">
			{!! Form::open(['route' => ['banner.destroy', $ban->id], 'method' => 'DELETE']) !!}
				<button type="submit" class="btn btn-danger">X</button>
			{!! Form::close() !!}
		</div>


	    @endforeach


		
	</section>
	
@stop