@extends ('layout')

@section ('content')

	<section id="contenido">

		<div class="parent">
		@foreach ($articles as $article)
			<article class="item">
				<figure class="imagen_item">
					<img alt="embedded image" src="data:image/jpg;base64,{{chunk_split(base64_encode($article->image))}}" />
				</figure>
				<h2 class="titulo_item">
					<a href="#">{{ $article->name }}</a>
				</h2>
				<p>{{ $article->description }}</p>
				<div class="disponibles">Precio: ${{ $article->cost }}</div>

				{!! Form::open(['route' => 'cart.store', 'method' => 'POST']) !!}
					{!! Form::hidden('article_id', $article->id, array('class' => 'form-control', 'required' => 'required')) !!}
					<input class="precio" name="amount" value="1" min="1" max="9999" maxlength="5" autocomplete="off" type="number">
					<button class="btn agregarCarrito" type="submit">Agregar al carrito</button>
				{!! Form::close() !!}
				<!--<a href="{{ route('article.cart', ['article_id' => $article->id]) }}" class="agregarCarrito">Agregar al carrito</a>-->
				
			</article>
		@endforeach
		
		</div>
	</section>

@stop