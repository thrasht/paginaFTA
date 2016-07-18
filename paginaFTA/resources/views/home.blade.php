@extends ('layout')

@section ('content')

	<section id="contenido">
    @include('partials.message')
    
    <div id="slider">
      @if(Auth::user() && Auth::user()->type == 0)
        <a href="{{ route('banner.edit') }}" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Editar</a>
      @endif

      <ul class="slides">
        @foreach($banner as $ban)
          <li class="slide"><img src="{{ asset('banner/' . $ban->imagen) }}"></li>
        @endforeach
          <li class="slide"><img src="{{ asset('banner/' . $banner[0]->imagen) }}"></li>
      </ul>
      <!-- 
    
			<div class="bannerIzq" id="bannerIzq"><</div>
			<div class="bannerDer" id="bannerDer">></div> -->
		</div>

		
	</section>
	
@stop