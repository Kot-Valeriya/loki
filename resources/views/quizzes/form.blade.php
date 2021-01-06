@extends('layouts.mainLayout')

@section('title','Loki-Create your own quiz')

@section('head')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css?v=').time() }}"/>
  <script src="{{asset('js/create-new-question.js?v=').time()}}"></script>
   <script src="{{asset('js/main.js?v=').time()}}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/checkboxes-style.css?v=').time() }}"/>

@endsection

@section('body')<body> @endsection
@section('content')

<div class="row">
          <!-- Content -->
          <div id="content" class="8u skel-cell-important">
            <section>
              <header>

                @if(Request::segment(3)==="edit")
                <h2>{{__('form-quiz.editQuiz')}}</h2>
                <span class="byline">{{__('form-quiz.editQuizInf')}}</span>

                @elseif(Route::currentRouteName()==="quizzes.show")
                <h2>{{__('form-quiz.textBrainstorm')}}</h2>
                <span class="byline">{{$quiz->description}}</span>

                @else
                <h2>{{__('form-quiz.createQuiz')}}</h2>
                <span class="byline">{{__('form-quiz.createQuizInf')}}</span>
                @endif

                 <div class="bg-contact2" style="background-image: url('/images/bg-01.jpg');">
                 <div class="container-contact2">
                 <div class="wrap-contact2">

                @include($partial, [
                  'quiz'=> $quiz?? '',
                  'remainingQuestions' => $remainingQuestions?? '',
                  'question'=>$question ?? '',
                  'score'=>$score ?? '',
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