@extends('layouts.mainLayout')

@section('title','Loki')

@section('featured')
<!-- Featured -->
<div id="featured">
    <div class="container">
        <header>
            <h2>
                {{ __('welcomePage.welcome') }}
            </h2>
        </header>
        <p>
            {!!__('welcomePage.entry')!!}
        </p>
        <hr/>
        <div class="row">
            <section class="4u">
                <span class="pennant">
                    <span class="fa fa-briefcase">
                    </span>
                </span>
                {!!__('welcomePage.block1')!!}
                <a class="button button-style1" href="{{route('quizzes.index')}}">
                    {{__('buttons.popIn')}}
                </a>
            </section>
            <section class="4u">
                <span class="pennant">
                    <span class="fa fa-lock">
                    </span>
                </span>
                {!!__('welcomePage.block2')!!}
                <a class="button button-style1" href="{{route('quizzes.create')}}">
                    {{__('buttons.create')}}
                </a>
            </section>
            <section class="4u">
                <span class="pennant">
                    <span class="fa fa-globe">
                    </span>
                </span>
                <h3>
                    Maecenas luctus lectus
                </h3>
                <p>
                    Curabitur sit amet nulla. Nam in massa. Sed vel tellus. Curabitur sem urna, consequat vel, suscipit in, mattis placerat, nulla. Sed ac leo.
                </p>
                <a class="button button-style1" href="#">
                    Read More
                </a>
            </section>
        </div>
    </div>
</div>
@endsection

@section('body')
<body class="homepage">
@endsection

@section('content')
    <div id="content">
        <div class="row">
            @foreach($quizzes as $quiz)
            <section class="6u">
                <a class="image full" href="{{route('quizzes.show',['quiz'=>$quiz])}}">
                    <img alt="" src="images/welcome{{$loop->index}}.jpg"/>
                </a>
                <header>
                    <h2>
                        <a href="{{route('quizzes.show',['quiz'=>$quiz])}}">
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
        <div class="row">
            @foreach($quizzes1 as $quiz)
            <section class="6u">
                <a class="image full" href="{{route('quizzes.show',['quiz'=>$quiz])}}">
                    <img alt="" src="images/welcome1{{$loop->index}}.jpg"/>
                </a>
                <header>
                    <h2>
                        <a href="{{route('quizzes.show',['quiz'=>$quiz])}}">
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
 @endsection

@section('tweet')
@include('partials.tweet')
@endsection
