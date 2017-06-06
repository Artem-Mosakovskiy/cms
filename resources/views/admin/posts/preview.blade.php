@extends('layouts.admin')

@section('admin.content')

    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">Передосмотр</div>

            </div>
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="catName" class="col-sm-2 control-label">Заголовок</label>
                        <div class="col-sm-10">
                            <input type="text" disabled name="title" value="{{ Input::old('title', $post->title) }}" class="form-control" placeholder="Заголовок Статьи">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="catName" class="col-sm-2 control-label">Описание</label>
                        <div class="col-sm-10">
                            <input type="text" disabled name="description" value="{{ Input::old('description', $post->description) }}" class="form-control" placeholder="Описание Статьи">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="catName" class="col-sm-2 control-label">Ключевые слова</label>
                        <div class="col-sm-10">
                            <input type="text" name="keywords" disabled value="{{ Input::old('keywords', $post->keywords) }}" class="form-control" placeholder="через запятую">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="catName" class="col-sm-2 control-label">Категория</label>
                        <div class="col-sm-10">
                            {{ Form::select('category_id', [null => 'Выберите категорию'] +  $categories, $post->category_id, ['class' => 'form-control', 'disabled']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="catName" class="col-sm-2 control-label">Контент</label>
                        <div class="col-sm-10">
                            <div class="editor"></div>

                            <div style="display: none;" id="content"><?php echo $post->content ?></div>
                            <textarea style="display: none;" name="content"></textarea>
                            <input style="display: none;" type="file" name="img">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <a class="btn btn-primary" href="/admin/activatePost/{{ $post->id }}">
                                Активировать
                            </a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/tinymce.min.js"></script>
    <script>
        var token = '{{ csrf_token() }}';
        var disabled = true;
    </script>
    <script src="/js/edit_add_post.js"></script>

@endsection