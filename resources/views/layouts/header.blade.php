<nav class="header navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.guest') }}">{{ __('ゲストログイン') }}</a>
                        </li>
                    @endif

                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog.index') }}">{{ __('トレーニング一覧') }}</a>
                        </li>
                    @endif

                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            トレーニング
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('blog.create') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('blog_create').submit();">
                                {{ __('新規記録') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('blog.index') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('blog_index').submit();">
                                {{ __('トレーニング一覧') }}
                            </a>
                            <form id="blog_create" action="{{ route('blog.create') }}" method="GET" class="d-none">
                                @csrf
                            </form>
                            <form id="blog_index" action="{{ route('blog.index') }}" method="GET" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            体重
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('weight.create') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('weight_create').submit();">
                                {{ __('新規記録') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('weight.index') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('weight_index').submit();">
                                {{ __('体重一覧') }}
                            </a>
                            <form id="weight_create" action="{{ route('weight.create') }}" method="GET" class="d-none">
                                @csrf
                            </form>
                            <form id="weight_index" action="{{ route('weight.index') }}" method="GET" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.show', auth()->user()->id) }}"
                                onclick="event.preventDefault();
                                    document.getElementById('show').submit();">
                                {{ __('マイページ') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('ログアウト') }}
                            </a>
                            <form id="show" action="{{ route('user.show', auth()->user()->id) }}" method="GET" class="d-none">
                                @csrf
                            </form>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
