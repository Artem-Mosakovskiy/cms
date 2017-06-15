@extends('layouts.admin')

@section('admin.content')

    <div class="content-box-large">

        <h4>Профайл</h4>

        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach

        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab"  href="#account">Account Settings</a></li>
            <li><a data-toggle="tab" href="#password">Change Password</a></li>
        </ul>

        <div class="tab-content">
            <div id="account" class="tab-pane fade in active">
                <div class="panel-body">
                    <div class="col-md-8">
                        <form class="form-horizontal" role="form" action="/users/update" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="catName" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-6">
                                    {{ Form::email('email', $user->email, ['class'=>'form-control', 'placeholder' => 'Email']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="catName" class="col-sm-2 control-label">Имя</label>
                                <div class="col-sm-6">
                                    {{ Form::text('name', $user->name, ['class'=>'form-control', 'placeholder' => 'Имя']) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ $user->photo ? '/uploads/users/avatar/'.$user->photo : '/images/profile.png' }}" class="img-circle profile-img" alt="profileImg">
                        <input type="file" name="userPhoto">
                        <button id="uploadPhoto" class="btn btn-danger">Добавить фото</button>
                    </div>

                </div>
            </div>

            <div id="password" class="tab-pane fade">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="/user/password" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="catName" class="col-sm-2 control-label">Старый пароль</label>
                            <div class="col-sm-4">
                                {{ Form::password('old_password', ['class'=>'form-control', 'placeholder' => 'Текущий пароль']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="catName" class="col-sm-2 control-label">Новый пароль</label>
                            <div class="col-sm-4">
                                {{ Form::password('password', ['class'=>'form-control', 'placeholder' => 'Новый пароль']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="catName" class="col-sm-2 control-label">Подтверждение</label>
                            <div class="col-sm-4">
                                {{ Form::password('password_confirmation', ['class'=>'form-control', 'placeholder' => 'Повторите']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Изменить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection