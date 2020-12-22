@extends('layouts.mainLayout')

@section('title','Loki-Create your own quiz')
@section('head')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css?v=').time() }}"/>
  <script src="{{asset('js/create-new-question.js')}}"></script>

@endsection

@section('body')<body> @endsection
@section('content')

<div class="row">
          <!-- Content -->
          <div id="content" class="8u skel-cell-important">
            <section>
              <header>
                @if(Request::segment(3)==="edit")
                <h2>Edit your quiz</h2>
                <span class="byline">You may update any data in your quiz in minutes here !</span>

                @else
                <h2>Time to create something amazing !</h2>
                <span class="byline">Create an awesome quiz in minutes</span>
                @endif

                 <div class="bg-contact2" style="background-image: url('/images/bg-01.jpg');">
                 <div class="container-contact2">
                 <div class="wrap-contact2">

                @include($partial, [
                  'quiz'=> $quiz?? '',
                  'remainingQuestions' => $remainingQuestions?? '',
                  'question'=>$question ?? '',
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