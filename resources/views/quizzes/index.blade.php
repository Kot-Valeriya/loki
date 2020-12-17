@extends('layouts.mainLayout')

@section('title','Loki-Quizzes')



@section('body')
<body>
    @endsection
@section('content')
    <div class="row">
        <div class="container" id="content">
            <header class="header">
            <h2>Choose your quiz !</h2>
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
                    <a class="image full" href="#">
                        <img alt="Rubik's cube picture" src="images/default-display-quizzes/quiz{{$loop->iteration}}.jpg"/>
                    </a>
                    <header>
                        <h2>
                            <a href="/quizzes/{{$quiz->id}}">
                            {{ $quiz->title }}
                        </a>
                        </h2>
                    </header>
                    <p>
                        {{ $quiz->description }}
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
