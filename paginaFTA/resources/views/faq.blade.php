@extends('layout')

@section('content')

	<section id="contenido">
		@include('partials.message')

		@if (Auth::user() && Auth::user()->type == 0)
			<a href="{{ route('faq.create') }}" class="btn btn-default btn-lg">
	  			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
			</a>
		@endif

		@foreach ($faqs as $faq)
		
			<article>
				@if (Auth::user() && Auth::user()->type == 0)
					<div class="opcionesArticles">
						<a href="{{ route('faq.edit', ['id' => $faq->id]) }}" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
						{!! Form::open(['route' => ['faq.destroy', 'id' => $faq->id], 'method' => 'DELETE']) !!}
						<button type="submit" class="btn btn-danger btn-xs">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						</button> 
						{!! Form::close() !!}
					</div>
				@endif
				
				<h2> {{ $faq->question }} </h2>
				<p> {{ $faq->answer}} </p>
			</article>
		@endforeach
		
			
		{!! $faqs->render() !!}
	</section>


@stop