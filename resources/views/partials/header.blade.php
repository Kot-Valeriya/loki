<!-- Header -->
<div id="header">
    <div id="nav-wrapper">
        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li class="{{Request::path()==='/'? 'active':''}}">
                    <a href="/">
                        {{__('buttons.header1')}}
                    </a>
                </li>

                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                <li class="{{Request::path()==='login'? 'active':''}}">
                    <a class="nav-link" href="{{ route('login') }}">
                         {{__('buttons.header6')}}
                    </a>
                </li>
                @endif

                    @if (Route::has('register'))
                <li class="{{Request::path()==='register'? 'active':''}}">
                    <a class="nav-link" href="{{ route('register') }}">
                         {{__('buttons.header7')}}
                    </a>
                </li>
                @endif


                @else
                <li class="{{Request::segment(1)==='users'? 'active':''}}">
                     <a  class="nav-link" href="{{route('users.show',['user'=>Auth::user()->id])}}">
                                    {{__('buttons.header2')}}
                        </a>
                    <div class="sl-nav">
                        <ul>
                            <li class="nav-item dropdown">
                                <i aria-hidden="true" class="fa fa-angle-down"></i>
                                <div class="triangle"> </div>
                                <ul>
                                    <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('buttons.logout') }}
                                            </a>
                                        </li>
                                        <form action="{{ route('logout') }}" class="d-none" id="logout-form" method="POST">
                                            @csrf
                                        </form>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
                @endguest
                <li class="{{Request::path()==='quizzes'? 'active':''}}">
                    <a href="/quizzes">
                        {{__('buttons.header3')}}
                    </a>
                </li>
                <li class="{{Request::path()==='leaderboard'? 'active':''}}">
                    <a href="/leaderboard">
                        {{__('buttons.header4')}}
                    </a>
                </li>
                <li class="{{Request::path()==='about'? 'active':''}}">
                    <a href="/about">
                        {{__('buttons.header5')}}
                    </a>
                </li>
                @include('partials.lang')
            </ul>
        </nav>
    </div>
    <div class="container">
        <!-- Logo -->
        <div id="logo">
            <h1>
                <a href="#">
                    Loki
                </a>
            </h1>
            <span class="tag">
                Train your brain
            </span>
        </div>
    </div>
</div>
