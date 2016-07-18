@extends ('layout')

@section ('content')

<section id="contenido">
	
	@if($inbox->count() > 0)
		<article class="contenidoCarrito">
			<table class="table">
				<thead>
					<tr>
						<td class="texto">ID</td>
						<td class="texto">Nombre</td>
						<td class="texto">Correo</td>
						<td class="texto">Asunto</td>
						<td class="texto">Fecha</td>
						<td class="texto">Acción</td>
					</tr>
				</thead>
				<tbody>
				@foreach($inbox as $message)
					@if ($message->seen == 0)
						<tr class="success">
					@else
						<tr>
						@if ($message->reply)
							<tr class="warning">
						@endif
					@endif

						<td>{{ $message->id }}</td>
						<td class="">{{ $message->name }}</td>
						<td class="">{{ $message->email }}</td>
						<td class="">{{ $message->subject }}</td>
						<td class="">{{ $message->created_at }}</td>
						<td>
							<a href="{{ route('contact.open', ['id' => $message->id]) }}">Ver</a>

						<!-- 
							{!! Form::open(['route' => ['cart.destroy', $message->id], 'method' => 'DELETE']) !!}
								<button type="submit" class="btn">Remover</button>
							{!! Form::close() !!} -->
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</article>
		@endif

</section>

@stop