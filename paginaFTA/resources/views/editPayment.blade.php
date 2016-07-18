@extends ('layout')

@section ('content')

	<section id="contenido">
	
	@include('partials.menuProfile')

		<div class="contenidoPerfil">
			<h3>Si no es legible, o no se sube una imagen del comprobante
				de pago, es importante indicar en la caja de comentarios
			    los datos de la cuenta, monto y hora del pago
			</h3>

			<div class="panel-body">
				{!! Form::open(['route' => ['orders.uploadPayment', 'id' => $id], 'files' => true, 'class' => 'form-group', 'method' => 'PUT']) !!}
					<div class="form-group">
						{!! Form::label('comment', 'Comentarios') !!}
						{!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
						
						<div class="botonSubirP">
							{!! Form::file('payment', null) !!}
						</div>

						<div class="botonEditP">
							{!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
						</div>
					</div>
				{!! Form::close() !!}
			</div>

		</div>

	</section>

@stop