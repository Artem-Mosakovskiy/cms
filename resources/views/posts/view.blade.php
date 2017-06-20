@extends('layouts.app')

@section('content')
    <div class="single-page-artical">
        <div class="artical-content">
            <h3>{{ $post->title }}</h3>
            {!! $post->content !!}

        </div>
        <div class="artical-links">
            <ul>
                <li><small> </small><span>{{ $post->created_at }}</span></li>
                <li><a href="#"><small class="admin"> </small><span>{{ $post->user->name }}</span></a></li>
                <li><a href="#"><small class="no"> </small><span>{{ count($post->comments) }} комментариев</span></a></li>
            </ul>
        </div>
        @if (!Auth::guest())
            @include('comments', [
            'comments' => $post->comments,
            'post' => $post
            ])
        @endif
    </div>
@endsection

@section('content')

    <h1 class="page-header text-center">
        {{ $post->title }}
    </h1>

    <a class="btn btn-primary" href="{{ \Illuminate\Support\Facades\URL::previous() }}">
        <span class="glyphicon glyphicon-chevron-left"></span>
        Назад
    </a>

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

@endsection