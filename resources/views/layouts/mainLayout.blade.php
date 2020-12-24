<!DOCTYPE HTML>
<!--
	Linear by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<title>@yield('title')</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="SHORTCUT ICON" href="{{ URL::asset('images/icons/favicon.ico')}}" type="image/x-icon" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <link rel="stylesheet" href="{{ asset('css/skel-noscript.css')}}" />
		<link rel="stylesheet" href="{{ asset('css/style.css')}}" />
		<link rel="stylesheet" href="{{ asset('css/style-desktop.css')}}" />
		<link href="{{ asset('css/user-profile-page-style.css')}}" rel="stylesheet"/>
		@yield('head','')
	</head>
	@yield('body')

    @include('partials.header')
    @yield('featured', '')

	<!-- Main -->
		<div id="main">
			<div class="container">
				@yield('content')
			</div>
		</div>

    @yield('tweet','')
	@include('partials.footer')

	</body>
</html>