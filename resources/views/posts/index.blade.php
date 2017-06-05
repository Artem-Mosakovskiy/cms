@extends('layouts.app')

@section('content')

    <h1 class="page-header">
        Главная
        <small>статьи</small>
    </h1>

    <!-- Blog Post -->

    @foreach($posts as $post)
        <h2>
            <a href="/posts/view/{{$post->id}}">{{ $post->title }}</a>
        </h2>
        <p class="lead">
            by <a href="#">{{ $post->user->name }}</a>
        </p>

        <hr>

        <p><?= $post->content ?></p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at }}</p>
        <a class="btn btn-primary" href="/posts/view/{{$post->id}}">
            Читать дальше
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>

        <hr>

    @endforeach

    {!! $posts->render() !!}

@endsection