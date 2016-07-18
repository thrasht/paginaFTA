@extends ('layout')

@section ('content')

	<section id="contenido">
		@include('partials.message')
		
			<div class="ordersOptions">
				<h3>Detalles de venta con folio {{ $details[0]->sell_id }}</h3>
				{{--*/ $cont = 0 /*--}}

				@if($details[0]->sell->status_id == 0 || $details[0]->sell->status_id == 2)
					@if($details[0]->sell->cancel == 0)
					{!!Form::open(['route' => ['orders.aprove', 'id' => $details[0]->sell_id], 'method' => 'PUT']) !!}
						{!! Form::submit('Autorizar', ['class' => 'btn btn-success']) !!}
					{!! Form::close() !!}

					{!!Form::open(['route' => ['orders.cancel', 'id' => $details[0]->sell_id], 'method' => 'PUT']) !!}
						{!! Form::submit('Cancelar', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
					@endif
				@else
					<h3>: {{ $details[0]->sell->stat->name }}</h3>
				@endif
			</div>

			@if($details[0]->sell->status_id > 3)
			<article class="contenidoCarrito">
				<h3>Datos del envío</h3>
				<h4>Paquetería</h4>
				<p>{{ $details[0]->sell->shipping }}</p>
				<h4>Código de rastreo</h4>
				<p>{{ $details[0]->sell->tracking }}</p>
			</article>
			@endif

			@if($details[0]->sell->status_id == 3)
			<article class="contenidoCarrito">
				<h3>Datos del envío</h3>
				<div class="panel panel-default">
					<div class="panel-body">
						{!! Form::open(['route' => ['orders.shipping', 'id' => $details[0]->sell_id], 'method' => 'POST']) !!}

							{!! Form::label('shipping', 'Paquetería') !!}
							{!! Form::text('shipping', null) !!}

							{!! Form::label('tracking', 'Código de rastreo') !!}
							{!! Form::text('tracking', null) !!}

							{!! Form::submit('Subir', ['class' => 'btn btn-success']) !!}

						{!!Form::close() !!}
					</div>
				</div>

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


	</section>

@stop