@extends('layouts.admin')

@section('admin.content')

    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">Добавить категорию</div>

            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" action="/admin/addCategory" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="catName" class="col-sm-2 control-label">Категория</label>
                        <div class="col-sm-10">
                            <input type="text" name="category_name" class="form-control" id="catName" placeholder="Название Категории">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Описание</label>
                        <div class="col-sm-10">
                            <textarea name="category_description" class="form-control" placeholder="Описание" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection