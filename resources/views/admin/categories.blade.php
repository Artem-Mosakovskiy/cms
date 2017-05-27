@extends('layouts.admin')

@section('admin.categories')

    <div class="row">
        <div class="col-md-10">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">Категории</div>

                    <div class="panel-options">
                        <a href="#" class="btn btn-success">Добавить категорию</a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td>Ottлчоварполвралорвалорплоаплрлапрапo</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-xs">Редактировать</a>
                                <a href="#" class="btn btn-danger btn-xs">Удалить</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection