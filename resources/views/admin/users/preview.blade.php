@extends('layouts.admin')

@section('admin.content')

    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">Юзер</div>

            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" action="/admin/users/save" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="catName" class="col-sm-2 control-label">Имя</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            {{ Form::text('', $user->name, ['class' => 'form-control', 'disabled']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="catName" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            {{ Form::text('', $user->email, ['class' => 'form-control', 'disabled']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="catName" class="col-sm-2 control-label">Статус</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            {{ Form::select('status', $statuses, $user->status_id, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Редактировать</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection