<!DOCTYPE HTML>

<html >
<head>
		<title>404 Page</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="SHORTCUT ICON" href="{{ URL::asset('images/icons/favicon.ico')}}" type="image/x-icon" />
<link href="{{ asset('css/errors-style.css?v=').time()}}" rel="stylesheet"/>
<script src="{{asset('js/errors.js?v=').time()}}"></script>
</head>
<body>

<a href="{{ url()->previous() }}" class="fa fa-arrow-left"></a>

<h1>
	40<span id="silhouette">4</span><span id="wobble">4</span></h1>
<p>{!!__('errors.404')!!}</p>
</body>
</html>
