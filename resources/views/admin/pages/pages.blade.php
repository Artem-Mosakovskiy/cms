@extends('layouts.admin')

@section('admin.content')

    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Страницы</div>

            <div class="panel-options">
                <a href="/admin/addPage" class="btn btn-success">Добавить Страницу</a>
            </div>

        </div>
        <div class="panel-body">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            @if(!$pages->isEmpty())
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Заголовок</th>
                        <th>Адрес</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->slug }}</td>
                                <td>
                                    <a href="/admin/editPage/{{ $page->id }}" class="btn btn-warning btn-xs">Редактировать</a>
                                    <a href="/admin/deletePage/{{ $page->id }}" class="btn btn-danger btn-xs">Удалить</a>
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