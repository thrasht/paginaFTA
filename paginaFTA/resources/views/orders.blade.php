@extends ('layout')

@section ('content')

	<section id="contenido">
	@include('errors.error_message')
	@include('partials.message')
	@include('partials.menuProfile')

		<div class="contenidoPerfil">
			@if($orders->count() > 0)

			<table class="table">
				<thead>
					<tr>
						<td class="productoCarrito texto">Folio</td>
						<td class="productoCarrito texto">Fecha</td>
						<td class="cantidadCarrito texto">Total</td>
						<td class="cantidadCarrito texto">Estatus</td>
						<td class="precioUnidadCarrito texto">Acción</td>
					</tr>
				</thead>
				<tbody>
				@foreach($orders as $order)
					@if($order->cancel == true)
						<tr class="danger">
					@else
						@if($order->seen == 1)
						<tr class="warning">
						@else
						<tr>
						@endif
					@endif
						<td class="productoCarrito">{{ $order->id }}</td>
						<td class="cantidadCarrito">{{ $order->created_at }}</td>
						<td class="precioUnidadCarrito">${{ $order->sellTotal }}</td>
						<td class="precioUnidadCarrito">{{ $order->stat->name }}</td>
						<td>
							@if($order->cancel == false)
								<a href="{{ route('profile.orders.detail', ['folio' => $order->id]) }}" class="ligas">Detalle</a>
								{!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'DELETE']) !!}
								<button type="submit" class="liga ligas">Cancelar</button>
								{!! Form::close() !!}

								<!-- Button trigger modal -->
								<!-- <button type="button" class="liga ligas" data-toggle="modal" data-target="#myModal">
								  Cancelar
								</button> -->
								@if($order->status_id == 1)
								<a href="{{ route('orders.editPayment', ['folio' => $order->id]) }}" class="ligas ligaOrder">Subir pago</a>
								@endif
							@else
								<p>Orden cancelada</p>
							@endif
							
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			
			<div class="paginacion">
				{!! $orders->render() !!}
			</div>

			<!-- Modal -->

			<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" id="ada" role="document">
			    <div class="modal-content">
			      <div class="modal-header modal-cancelar">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h3 class="modal-title danger" id="myModalLabel">Cancelar orden</h3>
			      </div>
			      <div class="modal-body">
			      	<article class="direccion">
						<h4>¿Está seguro de cancelar la orden?</h4>
					</article>
			      </div>
			      <div class="modal-footer">
						{!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'DELETE']) !!}
							<button type="submit" class="btn btn-danger">Cancelar</button>
						{!! Form::close() !!}
			      </div>
			    </div>
			  </div>
			</div> -->

			@else
				<p class="bg-danger carritoMessage">No se han realizado pedidos</p>
			@endif

		</div>

	</section>

@stop