@extends('layouts.admin')

@section('admin.content')

    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">{{ $title }}</div>

            <div class="panel-options">
                @if(Input::get('moderate') and \App\User::hasRole(1))
                    <a href="?" class="btn btn-primary">Активные</a>
                    @else
                        <a href="?moderate=true" class="btn btn-primary">Модерация</a>
                @endif
                <a href="/admin/addPost" class="btn btn-success">Добавить статью</a>
            </div>
        </div>
        <div class="panel-body">
            @if(!$posts->isEmpty())
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Заголовок</th>
                        <th>Автор</th>
                        <th>Категория</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user_id }}</td>
                                <td>{{ $post->category_id }}</td>
                                <td>
                                    @if(Input::get('moderate') and \App\User::hasRole(1))
                                        <a href="/admin/preview/{{ $post->id }}" class="btn btn-warning btn-xs">Просмотреть</a>
                                        <a href="/admin/activatePost/{{ $post->id }}" class="btn btn-success btn-xs">Активировать</a>
                                        <a href="/admin/deletePost/{{ $post->id }}" class="btn btn-danger btn-xs">Удалить</a>
                                    @endif

                                    @if(!Input::get('moderate'))
                                        <a href="/admin/editPost/{{ $post->id }}" class="btn btn-warning btn-xs">Редактировать</a>
                                        @if(\App\User::hasRole(1))
                                            <a href="/admin/deletePost/{{ $post->id }}" class="btn btn-danger btn-xs">Удалить</a>
                                        @endif
                                        @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <h4>Ничего не найдено</h4>
            @endif
        </div>
    </div>

@endsection