@extends('layouts.mainLayout')

@section('title','Loki-Quizzes')

@section('body')
<body>
    @endsection
@section('content')
    <div class="row">

        <div class="container" id="content">
            <header class="header">
                @if(Request::segment(3)==='quizzes')
                <h2>{{__('form-quiz.selectQuiz')}}
                 </h2>
                @else
                 <h2>{{__('form-quiz.selectQuizInf')}}</h2>
            @endif
            </header>
        <div>

                @foreach($quizzes as $quiz)

            @if($loop->index ==0 ||$loop->index%3==0 )
            @if($loop->index%3==0)
            </div>
            @endif
            <div class="row">
                @endif
                <section class="4u">
                    <a class="image full"
                    href="{{route('quizzes.show',['quiz'=>$quiz->id])}}">
                        <img alt="Rubik's cube picture" src="{{asset('images/default-display-quizzes/quiz'.$loop->iteration.'.jpg')}}"/>
                    </a>
                    <header>
                        <h2>
                            @if(Request::segment(3)==='quizzes')
                            <a href="/quizzes/{{$quiz->id}}/edit">
                            {{ $quiz->title }}
                        </a>
                        @else
                         <a href="{{route('quizzes.show',['quiz'=>$quiz->id])}}">
                            {{ $quiz->title }}
                        </a>
                        @endif
                        </h2>
                    </header>
                    <p>
                        {{ $quiz->description }}
                        <br/>
                        <ul class="tags">
                        @foreach($quiz->tags as $tag)
                         <li><a href="#" class="tag">{{$tag->name}}</a></li>

                        @endforeach
                    </ul>
                    </p>
                </section>
                @endforeach
            </div>
        </div>
    </div>
    <div class="pagination pagination-button">
        {!! $quizzes->links() !!}
    </div>
    @endsection
