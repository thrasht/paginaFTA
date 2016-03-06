@extends('layout')

@section('content')

	<section id="contenido">
		@foreach ($faqs as $faq)
		
			<article>
				<h2> ¿{{ $faq->question }}? </h2>
				<p> {{ $faq->answer}} </p>
			</article>
		@endforeach
		
			
		{!! $faqs->render() !!}
	</section>


@stop