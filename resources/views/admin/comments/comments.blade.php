@extends('layouts.admin')

@section('admin.content')

    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Комментарии</div>

        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Статья</th>
                    <th>Комментарий</th>
                    <th>Пользователь</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->post->title }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>{{ $comment->user->name }}</td>
                            <td>
                                <a href="/admin/deleteComment/{{ $comment->id }}" class="btn btn-danger btn-xs">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection