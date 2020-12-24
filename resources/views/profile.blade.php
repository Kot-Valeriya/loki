@extends('layouts.mainLayout')

@section('title','Loki')

@section('head')
<link href="{{ asset('css/skel-noscript.css')}}" rel="stylesheet"/>
<link href="{{ asset('css/style.css')}}" rel="stylesheet"/>
<link href="{{ asset('css/style-desktop.css')}}" rel="stylesheet"/>
<link href="{{ asset('css/util.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/user-profile-page-style.css')}}" rel="stylesheet"/>
<script src="{{asset('js/profile.js')}}"></script>
@endsection

@section('body')
<body class="homepage">
    @endsection

@section('content')
    <div id="content">

     <div class="bg-contact2" style="background-image: url('/images/bg-01.jpg');">
       <div class="container-contact2">
          <div class="wrap-contact2">
            <span class="contact2-form-title">
            Your profile
            </span>
<div class="muck-up">
  <div class="overlay"></div>
  <div class="top">
    <div class="user-profile">
      <img src="{{url('/images/user-picture.png')}}">
      <div class="user-details">
        <h4>{{$user->name}}</h4>
        <p>{{$user->email}}</p>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="filter-btn">

    <a id="all" class="tooltip" href="{{route('users.edit',['user'=>$user->id])}}"><span class="tooltiptext">Edit profile</span></a>
    <a id="three" class="tooltip" href="{{route('users.quizzes',['user'=>$user->id])}}"><span class="tooltiptext">Edit quizzes</span></a>

    <span class="toggle-btn ion-funnel"></span>
  </div>
  <div class="clearfix"></div>
  <div class="bottom">
    <div class="title">
      <h3>Your score</h3>
    </div>
    <ul class="points">
      <li class="yellow">
        <div class="user-profile-awards">
          <img src="{{url('/images/award1.png')}}">
          <img src="{{url('/images/award2.png')}}">
          <img src="{{url('/images/award3.png')}}">
        </div>
        <span class="task-title">Score : </span>
        <span class="task-title">{{$user->score}}</span>
      </li>
    </ul>
    <div class="title">
      <h3>Your quizzes</h3>
    </div>

     @if(session()->has('message'))
       <div class="success-msg">
       <i class="fa fa-check"></i>
       {{ session()->get('message') }}
    </div>
    @endif

    <ul class="points">
      @if($user->quizzes->isNotEmpty())
      @foreach($user->quizzes as $quiz)

       <form action="
       {{ route('quizzes.destroy',
             ['quiz'=>$quiz])}}"
        id="delete{{$loop->iteration}}"
        method="post">
        @method('delete')
        @csrf
       </form>

      <li class="orange">
        <a href="
        {{route('quizzes.show',['quiz'=>$quiz->id])}}">
        <span class="task-title">
          {{$quiz->title}}
        </span>
         <div class="delete-btn">
          <span
        class="toggle-btn"
        data-tooltip="Delete quiz">
          <button
        form="delete{{$loop->iteration}}"
         type="submit">
          </button>
          </span>
        </div>

        </a>
        <span class="task-time">{{$quiz->created_at}}</span>
        <span class="task-cat">{{$quiz->description}}</span>
      </li>

      @endforeach
       @else
      <span class="task-title">You have not created any quizzes</span>
       @endif
    </ul>
  </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection