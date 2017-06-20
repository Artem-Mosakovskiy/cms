@extends('layouts.admin')

@section('admin.content')

    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">Редактировать Страницу</div>

            </div>
            <div class="panel-body">
                <form class="form-horizontal" name="post" role="form" action="/admin/editPage" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="catName" class="col-sm-2 control-label">Заголовок</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" value="{{ Input::old('title', $page->title) }}" class="form-control" placeholder="Заголовок Страницы">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="catName" class="col-sm-2 control-label">Адрес</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="id" value="{{ $page->id  }}">
                            <input type="text" name="slug" value="{{ Input::old('title', $page->slug) }}" class="form-control" placeholder="Адрес Страницы">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="catName" class="col-sm-2 control-label">Описание</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" value="{{ Input::old('description', $page->description) }}" class="form-control" placeholder="Описание Страницы">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="catName" class="col-sm-2 control-label">Ключевые слова</label>
                        <div class="col-sm-10">
                            <input type="text" name="keywords" value="{{ Input::old('keywords', $page->keywords) }}" class="form-control" placeholder="через запятую">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="catName" class="col-sm-2 control-label">Контент</label>
                        <div class="col-sm-10">
                            <div class="editor"></div>

                            <div style="display: none;" id="content">{!!  $page->content !!}</div>
                            <textarea style="display: none;" name="content"></textarea>
                            <input style="display: none;" type="file" name="img">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/tinymce.min.js"></script>
    <script>
        var token = '{{ csrf_token() }}';
        var disabled = false;
    </script>
    <script src="/js/edit_add_post.js"></script>

@endsection