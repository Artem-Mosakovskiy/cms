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
                            @foreach(\App\Pages::getPages() as $page)
                                <li class="hvr-bounce-to-bottom"><a href="/pages/{{ $page->slug }}">{{ $page->title }}</a></li>
                            @endforeach
                        </ul>

                        <div class="sign-in">
                            <ul>
                                @if(Auth::guest())
                                    <li><a href="/login">Вход </a>/</li>
                                    <li><a href="/register">Регистрация</a></li>
                                    @else
                                    <li><a target="_blank" href="/admin">{{ Auth::user()->name }}</a></li>
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

<div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Подписаться на обновления</h5>
            </div>
            <form method="post" name="subscribe" action="/subscribe">
                {{ csrf_field() }}
                <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Email:</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Ваше имя:</label>
                            <input type="text" class="form-control" name="user_name">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-warning">Подписаться</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="footer-bottom">
    <div class="container">
        <p>&copy; 2017</p>
    </div>
</div>
<script src="/js/main.js"></script>
</body>
</html>