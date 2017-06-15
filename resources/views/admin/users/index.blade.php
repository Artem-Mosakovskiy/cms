@extends('layouts.admin')

@section('admin.content')

    <div class="content-box-large">

        <h4>Пользователи</h4>

        <ul class="nav ajax nav-tabs">
            <li class="active"><a data-toggle="tab" data-ajax="0" href="#all">All</a></li>
            <li><a data-toggle="tab" data-ajax="3" href="#approved">Approved</a></li>
            <li><a data-toggle="tab" data-ajax="2" href="#notApproved">Not Approved</a></li>
        </ul>

        <div class="tab-content">
            <div id="all" class="tab-pane fade in active">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>E-mail</th>
                            <th>Статус</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->status->status }}</td>
                                <td>
                                    <a href="/admin/users/preview/{{ $user->id }}" class="btn btn-warning btn-xs">Просмотреть</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="approved" class="tab-pane fade">
                <div class="panel-body">
                    <h5>Пусто</h5>
                </div>

            </div>
            <div id="notApproved" class="tab-pane fade">
                <div class="panel-body">
                    <h5>Пусто</h5>
                </div>
            </div>
        </div>
    </div>

@endsection