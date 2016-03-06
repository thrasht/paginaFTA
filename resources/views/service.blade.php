@extends ('layout')

@section ('content')

	<section id="contenido">

	
		<div class="parent">
			@foreach($articles as $article)
			<article class="item">
				<figure class="imagen_item">
					<img alt="embedded image" src="data:image/jpg;base64,{{chunk_split(base64_encode($article->image))}}" />
				</figure>
				<h2 class="titulo_item">
					<a href="#">{{ $article->name }} </a>
				</h2>
				<p>{{ $article->description }}</p>

				<div class="disponibles">disponibles: {{ $article->available }}</div>
				<div class="precio">Precio: ${{ $article->cost }}</div>
				<a href="#" class="agregarCarrito">Agregar al carrito</a>

			</article>
			@endforeach

		</div>
	</section>
	
@stop
	