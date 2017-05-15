<li class="{{ Request::is('/*') || Request::is('home-olympia*')? 'active' : '' }}">
	<a href="{{ route('home-olympia.index') }}">Home</a>
</li>
<li class="{{ Request::is('about-us*') ? 'active' : '' }}">
	<a href="{{ route('about-us.index') }}">About</a>
</li>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menus <b class="caret"></b></a>
	<ul class="dropdown-menu">
		@foreach($menus as $menu)
		<li><a href="{!! route('menu_frontend.show', [$menu->id]) !!}">{{ $menu->name }}</a></li>
		@endforeach
	</ul>
</li>
<li class="{{ Request::is('event*') ? 'active' : '' }}">
	<a href="{{ route('event.index') }}">Event</a>
</li>
<li class="{{ Request::is('register1*') ? 'active' : '' }}">
	<a href="{{ route('register1.index') }}">Register</a>
</li>
<li class="{{ Request::is('login1*') || Request::is('logout1*')? 'active' : '' }}">
	@if(Session::has('users'))  
	<a href="{{ route('logout1') }}">Logout</a>
	@else
	<a href="{{ route('login1.index') }}">Login</a>
	@endif
</li>