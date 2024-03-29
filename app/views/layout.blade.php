@extends('html')

@section('content')

	<div class="navbar navbar-default navbar-static-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ route('home') }}"><span class="fui-checkbox-checked"></span> Todo App</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{ route('logout') }}">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container">
		@yield('content_page')
	</div>

	<div class="footer navbar navbar-default  navbar-fixed-bottom">
		<div class="container">
			<div class="navbar-right">
				<div id="bs-example-navbar-collapse-4" class="collapse navbar-collapse">
					<p class="navbar-text">Made with love by <a href="http://dimsav.com">Dimitris Savvopoulos</a></p>
				</div>
			</div>
		</div>
	</div>
@stop