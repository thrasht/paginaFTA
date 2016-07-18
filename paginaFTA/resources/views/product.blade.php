@extends ('layout')

@section ('content')

	<section id="contenido">
		@include('partials.message')
		
		@if (Auth::user() && Auth::user()->type == 0)
			<a href="{{ route('article.create', ['type' => $articles[0]->nameType]) }}" class="btn btn-default btn-lg">
	  			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
			</a>
		@endif

		<div class="parent">
		@foreach ($articles as $article)
			<article class="item">
				@if (Auth::user() && Auth::user()->type == 0)
					<div class="opcionesArticles">
						<a href="{{ route('article.edit', ['id' => $article->id]) }}" class="btn btn-default btn-xs">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
						{!! Form::open(['route' => ['article.destroy', 'id' => $article->id], 'method' => 'DELETE']) !!}
						<button type="submit" class="btn btn-danger btn-xs">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						</button> 
						{!! Form::close() !!}
					</div>
				@endif
				
				<figure class="imagen_item">
					<!-- <img alt="embedded image" src="data:image/jpg;base64,{{chunk_split(base64_encode($article->image))}}" /> -->
					<img src="{{ asset('articles/' . $article->image) }}" />
				</figure>
				<h2 class="titulo_item">
					<a href="#">{{ $article->name }}</a> 
				</h2>
				<p>{{ $article->description }}</p>
				<div class="disponibles">Precio: ${{ $article->cost }}</div>

				{!! Form::open(['route' => 'cart.store', 'method' => 'POST']) !!}
					{!! Form::hidden('article_id', $article->id, array('class' => 'form-control', 'required' => 'required')) !!}
					<input class="precio" name="amount" value="1" min="1" max="9999" maxlength="5" autocomplete="off" type="number">
					@if(Auth::user() && Auth::user()->type == 0)
						<a class="btn agregarCarrito">Agregar al carrito</a>
					@else
						<button class="btn agregarCarrito" type="submit">Agregar al carrito</button>
					@endif
				{!! Form::close() !!}
				<!--<a href="{{ route('article.cart', ['article_id' => $article->id]) }}" class="agregarCarrito">Agregar al carrito</a>-->
				
			</article>
		@endforeach
		
		</div>
	</section>

@stop