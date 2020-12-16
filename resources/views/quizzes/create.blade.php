@extends('layouts.mainLayout')

@section('title','Loki-Create your own quiz')
@section('head')
<link rel="stylesheet" href="{{ asset('css/skel-noscript.css')}}" />
<link rel="stylesheet" href="{{ asset('css/style.css')}}" />
 <link rel="stylesheet" href="{{ asset('css/style-desktop.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
@endsection

@section('body')<body> @endsection
@section('content')
<div class="row">
          <!-- Content -->
          <div id="content" class="8u skel-cell-important">
            <section>
              <header>
                <h2>Time to create someething amazing!</h2>
                <span class="byline">Create an awesome quiz in minutes</span>
                @include($partial, [
                  'quiz'=> $quiz?? '',
                  'remainingQuestions' => $remainingQuestions?? ''
                  ])
              </header>
            </section>
          </div>
@include('partials.right-sidebar')
</div>
@endsection