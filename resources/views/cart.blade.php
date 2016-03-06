@extends('layout')

@section('content')
	<section id="contenido">

		@if($carts->count() > 0)
		{{--*/ $cont = 0 /*--}}
		<article class="contenidoCarrito">
			<table class="table">
				<thead>
					<tr>
						<td class="productoCarrito texto">Imagen</td>
						<td class="productoCarrito texto">Nombre del Producto</td>
						<td class="cantidadCarrito texto">Cantidad</td>
						<td class="precioUnidadCarrito texto">P/U</td>
						<td class="precioSubtotalCarrito texto">Subtotal</td>
					</tr>
				</thead>
				<tbody>
				@foreach($carts as $cart)
					{{--*/ $cont = $cont + $cart->article->cost * $cart->amount /*--}}
					<tr>
						<td>
							<figure class="imgCarrito">
								<img alt="embedded image" src="data:image/jpg;base64,{{chunk_split(base64_encode($cart->article->image))}}" />
							</figure>
						</td>
						<td class="productoCarrito">{{ $cart->article->name }}</td>
						<td class="cantidadCarrito">{{ $cart->amount }}</td>
						<td class="precioUnidadCarrito">${{ $cart->article->cost }}</td>
						<td class="precioSubtotalCarrito">${{ $cart->article->cost * $cart->amount }}</td>
						<td>
							{!! Form::open(['route' => ['cart.destroy', $cart->id], 'method' => 'DELETE']) !!}
								<button type="submit" class="btn removerCarrito">Remover</button>
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</article>

		<article class="granTotal">
			<div class="textoTotal"> Total: </div>
			<div class="total">${{ $cont }}</div>
			{!! Form::open(['route' => 'sell.store', 'method' => 'POST']) !!}
				{!! Form::submit('Comprar', ['class' => 'realizarPedido']) !!}
			{!! Form::close() !!}

		</article>
		@else
			<p class="bg-danger carritoMessage">No se ha añadido ningún elemento al carrito</p>
		@endif

		
	</section>

@stop