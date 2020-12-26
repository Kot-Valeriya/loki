@extends('layouts.mainLayout')

@section('title','Loki')

@section('head')
<link href="{{ asset('css/skel-noscript.css')}}" rel="stylesheet"/>
<link href="{{ asset('css/style.css')}}" rel="stylesheet"/>
<link href="{{ asset('css/style-desktop.css')}}" rel="stylesheet"/>
<link href="{{ asset('css/util.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/main.css?v=2') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/user-profile-page-style.css?v=2')}}" rel="stylesheet"/>
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
            {!!__('profile.profileHeader')!!}
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

    <a id="all" class="tooltip" href="{{route('users.edit',['user'=>$user->id])}}"><span class="tooltiptext">
    {!!__('profile.editProfile')!!}</span></a>
    <a id="three" class="tooltip" href="{{route('users.quizzes',['user'=>$user->id])}}"><span class="tooltiptext">{!!__('profile.editQuizzes')!!}</span></a>

    <span class="toggle-btn ion-funnel"></span>
  </div>
  <div class="clearfix"></div>
  <div class="bottom">
    <div class="title">
      <h3>{!!__('profile.scoreHeader')!!}</h3>
    </div>
    <ul class="points">
      <li class="yellow">
        <div class="user-profile-awards">
          <img src="{{url('/images/award1.png')}}">
          <img src="{{url('/images/award2.png')}}">
          <img src="{{url('/images/award3.png')}}">
        </div>
        <span class="task-title">{!!__('profile.score')!!} : </span>
        <span class="task-title">{{$user->score}}</span>
      </li>
    </ul>
    <div class="title">
      <h3>{!!__('profile.quizzesHeader')!!}</h3>
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
        data-tooltip="{!!__('profile.deleteQuiz')!!}">
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
          </ul>
       @else
      <span class="task-title">
      {!!__('profile.emptyTrash')!!}
    </span>
       @endif

        @if($deletedQuizzes->isNotEmpty())
        <div class="title">
      {!!__('profile.deletedQuizzesHeader')!!}
    </div>

    <ul class="points">
      @foreach($deletedQuizzes as $trashed)
              <li class="red">

      <div class="delete-btn">
          <span
        class="toggle-btn"
        data-tooltip="{!!__('deletePermanently')!!}">

        <form action="
       {{ route('quizzes.delete',
             ['quizTrashed'=>$trashed->id])}}"
        id="deletePermanently{{$loop->iteration}}"
        method="post">
        <input type="hidden" name="_method" value="DELETE">
        @csrf
       </form>

          <button
        form="deletePermanently{{$loop->iteration}}"
         type="submit">
          </button>
          </span>
        </div>

        <div class="restore-btn delete-btn">
          <span
        class="toggle-btn"
        data-tooltip="{!!__('restoreQuiz')!!}">

        <form action="
       {{ route('quizzes.restore',
             ['quizTrashed'=>$trashed->id])}}"
        id="restore{{$loop->iteration}}"
        method="post">
        @csrf
        @method('patch')

       </form>

          <button
        form="restore{{$loop->iteration}}"
         type="submit">
          </button>

          </span>
        </div>
        <span class="task-title">
          {{$trashed->title}}
        </span>
        <span class="task-time">{{$trashed->created_at}}</span>
        <span class="task-cat">{{$trashed->description}}</span>
      </li>

      @endforeach
    </ul>
    @endif

  </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection