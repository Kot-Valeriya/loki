@extends('layouts.mainLayout')

@section('title','Loki-Leaderboard')

@section('head')
<link href="{{ asset('css/leaderboard-style.css')}}" rel="stylesheet"/>
@endsection

@section('body')
<body class="homepage">
    @endsection
@section('content')
    <div class="row">
        <div class="8u skel-cell-important" id="content">
            <section>
                <header>
                    <h2 class="leaderboard">
                        <span class="yellow">
                            {{__('leaderboard.leaderboard')}}
                        </span>
                    </h2>
                    <h3 class="leaderboard">
                        @guest
                        <a class="leaderboard yellow" href="{{ route('register') }}" target="_blank">
                            {!!__('leaderboard.registerText')!!}
                        @endguest
                        @auth
                        {!!__('leaderboard.authText')!!}
                        <a class="leaderboard" href="{{ route('quizzes.index') }}" target="_blank">
                            {!!__('leaderboard.authText1')!!}
                        </a>
                        !
                        @endauth
                    </h3>
                </header>
            </section>
            <table class="board-container">
                <thead>
                    <tr>
                        <th>
                            <h1>
                                {{__('leaderboard.position')}}
                            </h1>
                        </th>
                        <th>
                            <h1>
                                {{__('leaderboard.nickname')}}
                            </h1>
                        </th>
                        <th>
                            <h1>
                                {{__('leaderboard.enteredOn')}}
                            </h1>
                        </th>
                        <th>
                            <h1>
                                 {{__('leaderboard.score')}}
                            </h1>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <div class="award-image-wrap">
                                @if($loop->iteration<=3)

                                    <img src="images/award{{$loop->iteration}}.png"/>

                                @else

                            {{$loop->iteration+($users->currentPage() * $users->perPage()) - $users->perPage()}}
                             @endif
                            </div>
                        </td>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->created_at}}
                        </td>
                        <td>
                            {{$user->score}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination pagination-button">
                {!! $users->links() !!}
            </div>
        </div>
        @include('partials.right-sidebar')
    </div>
    @endsection
</body>