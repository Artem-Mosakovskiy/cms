@extends('layouts.admin')

@section('admin.content')

    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">Написать письмо</div>

            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" action="/admin/sendMail" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Контент</label>
                        <div class="col-sm-10">
                            <textarea name="message" class="form-control" placeholder="Напишите письмо" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection