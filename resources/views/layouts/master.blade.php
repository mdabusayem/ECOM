<!DOCTYPE html>
<html>
<head>
	<title>Ecommerce</title>
	@include('partials.styles')
</head>
<body>
<div class="wrapper">
	{{-- Navigation --}}
	
@include('partials.nav')
@include('partials.messages')
@yield('content')


@include('partials.footer')
</div>
</div>

@include('partials.scripts')
@yield('scripts')
</body>
</html>