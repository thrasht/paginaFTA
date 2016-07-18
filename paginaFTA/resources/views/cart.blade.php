@extends('layout')

@section('content')
	<section id="contenido">

		@include('errors.error_message')

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
						<td class="texto">Descuento</td>
						<td class="precioSubtotalCarrito texto">Subtotal</td>
					</tr>
				</thead>
				<tbody>
				@foreach($carts as $cart)
					{{--*/ $cont = $cont + $cart->article->cost * $cart->amount /*--}}
					<tr>
						<td>
							<figure class="imgCarrito">
								<!-- <img alt="embedded image" src="data:image/jpg;base64,{{chunk_split(base64_encode($cart->article->image))}}" /> -->
								<img src="{{ asset('articles/' . $cart->article->image) }}" alt="">
							</figure>
						</td>
						<td class="productoCarrito">{{ $cart->article->name }}</td>
						<td class="cantidadCarrito">{{ $cart->amount }}</td>
						<td class="precioUnidadCarrito">${{ $cart->article->cost }}</td>
						<td class="precioUnidadCarrito">{{ $cart->article->discount }}%</td>
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
			
			<!-- Button trigger modal -->
			<button type="button" class="realizarPedido" data-toggle="modal" data-target="#myModal">
			  Realizar pedido
			</button>

		</article>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" id="ada" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h3 class="modal-title" id="myModalLabel">Confirmar compra</h3>
		      </div>
		      <div class="modal-body">
		      	<article class="direccion">
					<h4>Dirección de envío</h4>
					<p>{{ Auth::user()->street }} {{ Auth::user()->number }}</p>
					<p>{{ Auth::user()->city }}</p>
					<p>{{ Auth::user()->state }}</p>
					<p>{{ Auth::user()->zipcode }}</p>
				</article>
				<article class="modal-precio">
					<h4>Resumen del pedido</h4>
					<p>Productos: ${{ $cont }}</p>
				</article>

		      </div>
		      <div class="modal-footer">
					{!! Form::open(['route' => 'sell.store', 'method' => 'POST']) !!}
						{!! Form::submit('Comprar', ['class' => 'realizarPedido']) !!}
					{!! Form::close() !!}
		      </div>
		    </div>
		  </div>
		</div>
		@else
			<p class="bg-danger carritoMessage">No se ha añadido ningún elemento al carrito</p>
		@endif

		
	</section>

@stop