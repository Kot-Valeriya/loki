@extends('layouts.mainLayout')

@section('title','About')


@section('head')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css?v=').time() }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/checkboxes-style.css?v=').time() }}"/>

@endsection

@section('body')
<body class="homepage">
@endsection

@section('content')
    <div id="content">

    	<header>
            <h2>
                {{__('about.header')}}
            </h2>
        </header>

        <div class="row">

         <section class="12u">
         	 {{__('about.article')}}
            <div class="boxes">
                @for ($i = 1; $i <=4; $i++)
                <input checked="" id="box-{{$i}}" type="checkbox">
                    <label class="point" for="box-{{$i}}">
                        {{__('about.point'.$i)}}
                    </label>
                </input>
                @endfor
            </div>
            {{__('about.endpoint')}}
        </section>
        <section class="12u">
        	<p>
        		{{__('about.call')}}
        	</p>
        </section>
        </div>
    </div>
@endsection


@section('tweet')
@include('partials.tweet')
@endsection