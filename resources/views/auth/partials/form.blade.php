@extends('layouts.mainLayout')

@section('title','Loki-Login')

@section('head')
<link href="{{ asset('css/skel-noscript.css')}}" rel="stylesheet"/>
<link href="{{ asset('css/style.css')}}" rel="stylesheet"/>
<link href="{{ asset('css/style-desktop.css')}}" rel="stylesheet"/>
<link href="{{ asset('css/util.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/checkboxes-style.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('body')
<body class="homepage">
    @endsection

@section('content')
    <div id="content">
        <div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
            <div class="container-contact2">
                <div class="wrap-contact2">

                @yield('content-form')

                </div>
            </div>
        </div>
    </div>
@endsection