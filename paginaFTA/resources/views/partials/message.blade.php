@if(Session::has('message'))
	<p class="bg-success mensaje">{{ Session::get('message') }}</p>
@endif