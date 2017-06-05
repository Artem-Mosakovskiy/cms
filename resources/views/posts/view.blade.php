@extends('layouts.app')

@section('content')

    <h1 class="page-header text-center">
        {{ $post->title }}
        {{--<small>статьи</small>--}}
    </h1>

    <a class="btn btn-primary" href="{{ \Illuminate\Support\Facades\URL::previous() }}">
        <span class="glyphicon glyphicon-chevron-left"></span>
        Назад
    </a>

    <!-- Blog Post -->

    <h2>
        <a href="/posts/view/{{$post->id}}">{{ $post->title }}</a>
    </h2>
    <p class="lead">
        by <a href="#">{{ $post->user->name }}</a>
    </p>

    <hr>

    <p><?= $post->content ?></p>
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at }}</p>


    <hr>

    @if (!Auth::guest())
        @include('comments', [
        'comments' => $post->comments,
        'post' => $post
        ])
    @endif

    {{--<!-- Pager -->
    <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Назад</a>
        </li>
        <li class="next">
            <a href="#">Вперед &rarr;</a>
        </li>
    </ul>--}}

@endsection