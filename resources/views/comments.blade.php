<div class="comment-grid-top">
    <h3>Комментарии</h3>
    <div class="comment-list">
        @foreach($comments as $comment)
            <div class="comments-top-top">
                <div class="top-comment-left">
                    <a href="#"><img class="img-responsive img-circle" src="/uploads/users/avatar/{{ $comment->user->photo }}" alt=""></a>
                </div>
                <div class="top-comment-right">
                    <ul>
                        <li><span class="left-at">{{ $comment->user->name }}</span></li>
                        <li><span class="right-at">{{ $comment->created_at }}</span></li>
                    </ul>
                    <p>{{ $comment->comment }}</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        @endforeach
    </div>


</div>

<div class="artical-commentbox">
    <h3>Оставьте комментарий</h3>
    <div class="table-form">
        <form name="addComment" >
            <input type="hidden" value="{{ $post->id }}" name="id">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="text" name="comment" class="form-control">
            <a id="addComment" class="btn btn-warning">
                Добавить комментарий
            </a>
        </form>
    </div>
</div>

<script>
    function addComment(data) {
        var $left = $('<div>').addClass('top-comment-left').append(
                $('<a>').append(
                        $('<img>').addClass('img-responsive img-circle').attr('src', '/uploads/users/avatar/' + data.user.photo)
                )
        );
        var $right = $('<div>').addClass('top-comment-right').append(
                $('<ul>').append(
                        $('<li>').append(
                                $('<span>').addClass('left-at').text(data.user.name)
                        ),
                        $('<li>').append(
                                $('<span>').addClass('right-at').text(data.comment.created_at)
                        )
                ),
                $('<p>').text(data.comment.comment)
        );
        var $comment = $('<div>').addClass('comments-top-top').append(
                $left, $right, $('<div>').addClass('clearfix')
        );
        $('.comment-list').prepend($comment);
    }

    $(function () {
        $('#addComment').on('click', function () {
            $.post('/ajaxAddComment', $('form[name=addComment]').serialize(), function (response) {
                addComment(response);
                $('[name=comment]').val('');
            });
        });
    });
</script>




