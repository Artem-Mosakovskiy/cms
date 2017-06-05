<div class="container">
    <div class="col-lg-5 col-sm-6 text-center">
        <div class="well">
            <h5>Комментарии</h5>

            <form name="addComment" class="input-group">
                <input type="hidden" value="{{ $post->id }}" name="id">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <input type="text" name="comment" class="form-control input-sm chat-input">
                <span class="input-group-btn">
                    <a id="addComment" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-comment"></span>
                        Добавить комментарий
                    </a>
                </span>
            </form>

            <hr >
            <ul class="list-unstyled ui-sortable-handle" id="commentsList">
                @foreach($comments as $comment)
                    <div>
                        <strong class="pull-left primary-font">{{ $post->user->name }}</strong>
                        <small class="pull-right text-muted">
                            <span class="glyphicon glyphicon-time"></span>
                            {{ $comment->created_at }}
                        </small><br>
                        <li class="ui-state-default">
                            {{ $comment->comment }}
                        </li><br>
                    </div>

                @endforeach
            </ul>
        </div>
    </div>
</div>
<script>
    function wrapTag(text, tag, className) {
        return '<' + tag + ' class="' + className + '">' + text + '</' + tag + '>'
    }

    function addComment(data) {
        var by = wrapTag(data.name, 'strong', 'pull-left primary-font');
        var created_at = wrapTag('<span class="glyphicon glyphicon-time"></span>' +
            data.comment.created_at, 'small', 'pull-right text-muted') + '<br>';
        var comment = wrapTag(data.comment.comment, 'li', 'ui-state-default') + '<br>';
        var result = wrapTag(by + created_at + comment, 'div');
        $('#commentsList').prepend(result);
    }

    $(function () {
        $('#addComment').on('click', function () {
            $.post('/ajaxAddComment', $('form[name=addComment]').serialize(), function (response) {
                addComment(response);
            });
        });
    });
</script>