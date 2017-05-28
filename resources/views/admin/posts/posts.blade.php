@extends('layouts.admin')

@section('admin.content')

    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Статьи</div>

            <div class="panel-options">
                <a href="/admin/addPost" class="btn btn-success">Добавить статью</a>
            </div>
        </div>
        <div class="panel-body">
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
                                <a href="/admin/editPost/{{ $post->id }}" class="btn btn-warning btn-xs">Редактировать</a>
                                <a href="/admin/deletePost/{{ $post->id }}" class="btn btn-danger btn-xs">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection