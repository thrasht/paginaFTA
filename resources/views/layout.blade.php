<!DOCTYPE html>
<html lang="es">
<head>
	
	<meta charset="utf-8" />
	<meta name="description" content="Proyecto de la primera generación del 2014 del curso de diseño web online" />
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
	<title>FTA San Luis Potosí</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ asset('css/normalize.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet"> 
	<script src="{{ asset('js/prefixfree.js') }}"></script>
		
</head>
</head>
<body>
	<header>
		<figure id="logo">
			<img src="{{ asset('logo.jpg') }}" />
		</figure>
		<h1>FTA San Luis Potosí</h1>
			
			@if (Auth::user())
				<div class="avatarContenido">
					Hola, {{ Auth::user()->user }}
					<a href="{{ url('/auth/logout') }}">Cerrar Sesión</a>
				</div>
			@else
				<div class="avatarContenido">
					<a href="{{ url('/auth/login') }}">Iniciar Sesión</a>
					<a href="{{ route('registerUser') }}">Registrarse</a>
				</div>
			@endif

			<figure id="avatar">
				<a href="#" id="mostrar">
					<img src="{{ asset('avatar.png') }}" />
				</a>
			</figure>

	</header>

	<!-- 
	*
	*	Autenticación desde un slider
	-->
	@if (Auth::guest())
	{!! Form::open(['url' => '/auth/login', 'id' => 'loginForm', 'class' => 'loginForm', 'method' => 'POST']) !!}
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		{!! Form::label('email', 'Correo:') !!}
		{!! Form::email('email', null, array('required' => 'required')) !!}

		{!! Form::label('password', 'Contraseña:') !!}
		{!! Form::password('password', array('required' => 'required')) !!}

		<button type="submit" class="btn btn-info">Ingresar</button>
		<a href="{{ route('registerUser') }}">Registrar</a>
	{!! Form::close() !!}

	@endif 

	<nav>
		<ul>
			<li><a href="{{ route('home') }}">Home</a></li>
			<li><a href="{{ route('article', 'productos') }}">Productos</a></li>
			<li><a href="{{ route('article', 'servicios') }}">Servicios</a></li>
			<li><a href="{{ route('contact') }}">Contacto</a></li>
			<li><a href="{{ route('faq') }}">FAQ</a></li>
			<li id="publicar_nav">
				<a href="{{ route('cart') }}" class="icon-cart">Carrito</a>
			</li>
		</ul>
	</nav>

	@yield('content')
	
	<footer>
		<p>
			<strong>FTA San Luis Potosí</strong>
		</p>
		<p>By Montes</p>
	</footer>
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="{{ asset('js/script.js') }}"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>