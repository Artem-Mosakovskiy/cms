@extends('layouts.admin')

@section('admin.content')

    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Подписчики</div>
            <div class="panel-options">
                <a href="/admin/sendToSubscribers" class="btn btn-success">Отправить письмо подписчикам</a>
            </div>
        </div>

        <div class="panel-body">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subscribers as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->user_name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="/admin/deleteSubscriber/{{ $item->id }}" class="btn btn-danger btn-xs">Удалить</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection