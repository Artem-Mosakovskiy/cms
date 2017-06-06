@extends('layouts.admin')

@section('admin.content')

    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Категории</div>

            <div class="panel-options">
                <a href="/admin/addCategory" class="btn btn-success">Добавить категорию</a>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>deleted</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->category_description }}</td>
                            <td>{{ $category->deleted }}</td>
                            <td>
                                <a href="/admin/editCategory/{{ $category->id }}" class="btn btn-warning btn-xs">Редактировать</a>
                                @if(\App\User::hasRole(1))
                                    @if($category->deleted == 1)
                                        <a href="/admin/deleteCategory/{{ $category->id }}" class="btn btn-danger btn-xs">Активировать</a>
                                        @else
                                        <a href="/admin/deleteCategory/{{ $category->id }}" class="btn btn-danger btn-xs">Удалить</a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection