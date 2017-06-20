{{--
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>CMS</title>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="/css/styles.css" rel="stylesheet">
    <link href="/css/jquery-ui.css" rel="stylesheet">
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery-ui.js"></script>

    <!-- Custom CSS -->
    <link href="/css/blog-home.css" rel="stylesheet">

</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CMS Blog</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Вход</a></li>
                    <li><a href="{{ route('register') }}">Регистрация</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                    Выход
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>

    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-md-8">

            @yield('content')

        </div>

        <div class="col-md-4">

            <div class="well">
                <h4>Поиск по статьям</h4>
                <div class="input-group">
                    --}}
{{--<input type="text" class="form-control">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>--}}{{--

                    <form method="get" action="/search/">
                        <div class="input-group form">
                            <input type="text" name="string" class="form-control" placeholder="Поиск...">
                            <span class="input-group-btn">
                                 <button class="btn btn-primary" type="submit">Поиск</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="well">
                <h4>Рубрики</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            @foreach($categories as $key => $value)
                                <li>
                                    <a class="btn btn-link" href="/category/{{$key}}">{{$value}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <hr>

    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p class="text-center">Copyright &copy; CMS Blog</p>
            </div>
        </div>
    </footer>

</div>

</body>

</html>
--}}
        <!DOCTYPE html>
<html>
<head>
    <title>BLog</title>

    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/css/jquery-ui.css" rel="stylesheet">
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/css/main.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<div class="banner-body">
    <div class="container">
        <div class="header">
            <div class="header-nav">
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/"><span>B</span>log</a>
                    </div>

                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="hvr-bounce-to-bottom active"><a href="/">Главная</a></li>
                        </ul>

                        <div class="sign-in">
                            <ul>
                                @if(Auth::guest())
                                    <li><a href="/login">Вход </a>/</li>
                                    <li><a href="/register">Регистрация</a></li>
                                    @else
                                    <li><a href="/admin">{{ Auth::user()->name }}</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="header-bottom">
            <div class="clearfix"> </div>
            @yield('content')
        </div>
    </div>
</div>
<div class="footer-bottom">
    <div class="container">
        <p>&copy; 2017</p>
    </div>
</div>
</body>
</html>