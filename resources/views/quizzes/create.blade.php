@extends('layouts.mainLayout')

@section('title','Loki-Create your own quiz')
@section('head')
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
                <h2>Time to create something amazing !</h2>
                <span class="byline">Create an awesome quiz in minutes</span>

                 <div class="bg-contact2" style="background-image: url('/images/bg-01.jpg');">
                 <div class="container-contact2">
                 <div class="wrap-contact2">
                @include($partial, [
                  'quiz'=> $quiz?? '',
                  'remainingQuestions' => $remainingQuestions?? ''
                  ])
                </div>
              </div>
            </div>
              </header>
            </section>
          </div>
@include('partials.right-sidebar')
</div>
@endsection