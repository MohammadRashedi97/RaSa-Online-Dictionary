<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    {{-- Leftmost Logo --}}
    <a class="navbar-brand" href="{{route('index')}}" style="color: skyblue;">
        <img src="/img/logo.png" alt="Our Logo" height="40" width="40">
        <b>R</b>a<b>S</b>a
    </a>

    {{-- navbar-toggler (for smaller screens) --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
        aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    {{-- Whole navbar --}}
    <div class="collapse navbar-collapse" id="navbarColor01">

        {{-- Left side of navbar --}}
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">About Us</a>
            </li>
            {{-- only show add post link if user is logged in --}}
            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('word.create') }}">+ Add New Word</a>
                </li>
            @endif
        </ul>

        {{-- middle logo --}}
        <a class="navbar-brand" href="{{route('index')}}" id="brand-style">
            RaSa
        </a>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Authentication Links -->
            {{-- Guest User --}}
            @guest
                <li class="nav-item" id="login">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @if (Route::has('register'))
                <li class="nav-item" id="register">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
            {{-- Logged User --}}
            @else
                <li class="nav-item dropdown" id="dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>

    </div>
</nav>