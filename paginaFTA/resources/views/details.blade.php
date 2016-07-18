@extends ('layout')

@section ('content')

	<section id="contenido">
		
	@include('partials.message')

	@include('partials.menuProfile')

		<div class="contenidoPerfil">

			@if($details[0]->sell->status_id > 3)
			<article class="contenidoCarrito">
				<h3>Datos de envío</h3>
				<h4>Paquetería</h4>
				<p>{{ $details[0]->sell->shipping }}</p>

				<h4>Código de rastreo</h4>
				<p>{{ $details[0]->sell->tracking }}</p>	

				@if($details[0]->sell->status_id == 4)
				{!! Form::open(['action' => ['SellsController@closeOrder', 'id' => $details[0]->sell_id], 'class' => 'navbar-form navbar-left pull-right']) !!}
					{!! Form::submit('Confirmar de recibido', ['class' => 'btn btn-success']) !!}
				{!! Form::close() !!}			
				@endif
			</article>
			@endif

			@if($details[0]->sell->status_id > 1)
			<article class="contenidoCarrito">
				<h3>Pago</h3>
				<h4>Comentarios</h4>
				@if($details[0]->sell->comments != null)
				<p>{{ $details[0]->sell->comments }}</p>
				@endif

				@if($details[0]->sell->image != null)
				<figure class="imagenDetalle">
					<img src="{{ asset('payments/' . $details[0]->sell->image) }}" alt="">
				</figure>
				@endif
				
			</article>
			@endif

			
			{{--*/ $cont = 0 /*--}}
			<article class="contenidoCarrito">
				<h3>Detalles de venta con folio {{ $details[0]->sell_id }}</h3>
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
					@foreach($details as $detail)
						{{--*/ $cont = $cont + $detail->article->cost * $detail->amount /*--}}
						<tr>
							<td>
								<figure class="imgCarrito">
									<!-- <img alt="embedded image" src="data:image/jpg;base64,{{chunk_split(base64_encode($detail->article->image))}}" /> -->
									<img src="{{ asset('articles/' . $detail->article->image) }}" alt="">
								</figure>
							</td>
							<td class="productoCarrito">{{ $detail->article->name }}</td>
							<td class="cantidadCarrito">{{ $detail->amount }}</td>
							<td class="precioUnidadCarrito">${{ $detail->article->cost }}</td>
							<td class="precioSubtotalCarrito">${{ $detail->article->cost * $detail->amount }}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</article>

			<article class="granTotal">
				<div class="textoTotal"> Total: </div>
				<div class="total">${{ $cont }}</div>
			</article>
		</div>

	</section>

@stop