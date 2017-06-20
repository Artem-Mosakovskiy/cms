@extends('layouts.app')

@section('content')

    <div class="blog">
        <div class="blog-left">
            <div class="posts-list">
                @foreach($posts as $post)
                    <div class="blog-left-grid">
                        <div class="blog-left-grid-left">
                            <h3><a href="/posts/view/{{$post->id}}">{{ $post->title }}</a></h3>
                            <p>by <span>{{ $post->user->name }}</span> | {{ $post->created_at }} | <span>{{ $post->category->category_name }}</span></p>
                        </div>
                        <div class="blog-left-grid-right">
                            @if( count($post->comments) > 0)
                                <a href="#" class="hvr-bounce-to-bottom non">{{ count($post->comments) }} Комментариев</a>
                            @endif
                        </div>
                        <div class="clearfix"> </div>

                        <div class="para">{!! $post->content !!}</div>

                        <div class="rd-mre">
                            <a href="/posts/view/{{$post->id}}" class="quod">Читать дальше ></a>
                        </div>
                    </div>
                @endforeach
            </div>
            {!! $posts->render() !!}
        </div>
        <div class="blog-right">
            <div class="search">
                <form method="get" action="/search/">
                    <div class="input-group form">
                        <input type="text" name="string" class="form-control" placeholder="Поиск...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Поиск</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="pgs">
                <h3>Рубрики</h3>
                <ul>
                    @foreach($categories as $key => $value)
                        <li>
                            <a href="/category/{{$key}}">{{$value}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="sap_tabs">
                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                    <ul class="resp-tabs-list">
                        <li class="resp-tab-item grid1" aria-controls="tab_item-0" role="tab"><span>Последние Комментарии</span></li>
                        <div class="clear"></div>
                    </ul>
                    <div class="resp-tabs-container">
                        <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                            @foreach($comments as $comment)
                                <div class="facts">
                                    <div class="tab_list">
                                        <img src="/uploads/users/avatar/{{ $comment->user->photo }}" alt=" " class="img-circle profile-img" />
                                    </div>
                                    <div class="tab_list1">
                                        <a href="/posts/view/{{ $comment->post->id }}">{{ $comment->post->title }}</a>
                                        <p>{{ $comment->created_at }} <span>{{ $comment->comment }}</span></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <script src="/js/easyResponsiveTabs.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#horizontalTab').easyResponsiveTabs({
                                type: 'default',
                                width: 'auto',
                                fit: true
                            });
                        });
                    </script>
                </div>
            </div>
            @if(!Cookie::get('subscribe'))
                <div class="newsletter">
                    <h3>Оформить подписку</h3>
                    <form>
                        <input type="email" class="form-control" placeholder="Email" required="">
                        <input type="submit" id="subscribe" class="btn btn-warning" value="Подписаться">
                    </form>
                </div>
            @endif

        </div>
        <div class="clearfix"> </div>
    </div>

    <script>
        $('.pagination').on('click', 'a', function (e) {
            e.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, "slow")
            var $active_li = $('ul.pagination li.active');
            var page = $active_li.find('span').text();

            $active_li.text('').append($('<a>').attr('src', '/home?page=' + page).text(page));
            $active_li.removeClass('active');

            var $li = $(this).parent('li');
            $($li).addClass('active');

            page = $($li).find('a').text();
            $($li).find('a').remove();
            $($li).append($('<span>').text(page));

            location.hash = page;

            $.get($(this).attr('href'), function (response) {
                showPosts(response.posts.data);
            });
        } );

        function createPost(post) {
            var $comments = '';
            if(post.comments.length > 0){
                $comments = $('<a>').addClass('hvr-bounce-to-bottom non').text(post.comments.length + ' Комментариев');
            }
            return $('<div>').addClass('blog-left-grid').append(
                    $('<div>').addClass('blog-left-grid-left').append(
                            $('<h3>').append($('<a>').attr('href', '/posts/view/' + post.id).text(post.title)),
                            $('<p>').append(
                                    'by ',
                                    $('<span>').text(post.user.name),
                                    ' | ' + post.created_at + ' | ',
                                    $('<span>').text(post.category.category_name)
                            )
                    ),
                    $('<div>').addClass('blog-left-grid-right').append(
                        $comments
                    ),
                    $('<div>').addClass('clearfix'),
                    $('<div>').addClass('para').html(post.content),
                    $('<div>').addClass('rd-mre').append(
                            $('<a>').addClass('quod').attr('href', '/posts/view/' + post.id).text('Читать дальше >')
                    )
            );
        }

        function showPosts(posts) {
            $('.posts-list').text('');
            $.each(posts, function (k,v) {
                $('.posts-list').append(createPost(v));
            });
        }
    </script>
@endsection