<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="/css/styles.css" rel="stylesheet">
    <link href="/css/cropper.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/jquery-ui.css" rel="stylesheet">
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="index.html">CMS Blog</a></h1>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="get" action="/admin/search/">
                            <div class="input-group form">
                                <input type="text" name="string" class="form-control" placeholder="Найти статью...">
                                <span class="input-group-btn">
                                 <button class="btn btn-primary" type="submit">Поиск</button>
                               </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ \Illuminate\Support\Facades\Auth::user()->photo ? '/uploads/users/avatar/'.\Illuminate\Support\Facades\Auth::user()->photo : '/images/profile.png' }}" class="img-circle profile-img-small" alt="profileImg">
                                    {{ Auth::user()->name }}
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu animated fadeInUp">
                                    <li><a href="/users/profile">Profile</a></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li{{-- class="current"--}}><a href="index.html"><i class="glyphicon glyphicon-home"></i> Главная</a></li>
                    <li>
                        <a href="/admin/users">
                            <i class="glyphicon glyphicon-user"></i>
                            Пользователи
                        </a>
                        <a href="/admin/categories">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            Категории
                        </a>
                        <a href="/admin/posts">
                            <i class="glyphicon glyphicon-edit"></i>
                            Статьи
                        </a>
                        <a href="/admin/comments">
                            <i class="glyphicon glyphicon-comment"></i>
                            Комментарии
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-10">
            <div class="row">
                <div class="col-md-10">
                    @yield('admin.content')
                </div>
            </div>
        </div>

    </div>

</div>

<footer>
    <div class="container">
        <div class="copy text-center">
            Copyright 2017 <a href='#'>CMS Blog</a>
        </div>
    </div>
</footer>

<script src="/js/main.js"></script>
<script src="/js/cropper.js"></script>
</body>
</html>