@extends ('layout')

@section ('content')

<section id="contenido">
	
		<article class="contenidoCarrito">
			<table class="table">
				<thead>
					<tr>
						<td class="texto">Folio</td>
						<td class="texto">User</td>
						<td class="texto">Fecha</td>
						<td class="texto">Total</td>
						<td class="texto">Estatus</td>
					</tr>
				</thead>
				<tbody>
				@foreach($orders as $order)
				@if($order->cancel == 1)
					<tr class="danger">
				@else
					@if($order->status_id == 5)
						<tr class="warning">
					@else
						@if($order->seen == 0)
							<tr class="success">
						@else
							<tr>
						@endif
					@endif
				@endif
						<td>{{ $order->id }}</td>
						<td class="">{{ $order->user->user }}</td>
						<td class="">{{ $order->created_at }}</td>
						<td class="">${{ $order->sellTotal }}</td>
						<td class="">{{ $order->stat->name }}</td>
						<td>
							<a href="{{ route('orders.detail', ['id' => $order->id]) }}">Ver</a>

						<!-- 
							{!! Form::open(['route' => ['cart.destroy', $order->id], 'method' => 'DELETE']) !!}
								<button type="submit" class="btn">Remover</button>
							{!! Form::close() !!} -->
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</article>

</section>

@stop