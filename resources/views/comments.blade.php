
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">Comments</h2>
            <section class="send-comment">
                {{--{!! Form::open(['url' => 'sendComment']) !!}--}}
                {{--{!! Form::hidden('user_id', $session) !!}--}}
                {{--{!! Form::hidden('page_id', $user->id) !!}--}}
                {{--{!! Form::textarea('comment-text', null, ['class' => 'form-control', 'rows' => '5']) !!}--}}
                {{--{!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}--}}
                {{--{!! Form::close(['url' => '#']) !!}--}}
@foreach($formComment as $form)
                {!! $form !!}
@endforeach
            </section>

        @if ($comments->count())
            <section class="comment-list">
                <!-- First Comment -->
                @foreach($comments as $comment)
                    @if($comment->page_id == $user->id && $comment->user_id == $user->id)
                <article class="row">
                    <div class="col-md-2 col-sm-2 hidden-xs">
                        <figure class="thumbnail">
                            {{--<img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />--}}
                            <img class="img-responsive" src="/images/uploads/{{ $user->photo->link }}" />
                            <figcaption class="text-center">{{ $comment->users->first_name }}</figcaption>
                        </figure>
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <div class="panel panel-default arrow left">
                            <div class="panel-body">
                                <header class="text-left">
                                    <div class="comment-user"><i class="fa fa-user"></i> {{ $comment->users->first_name }} {{ $comment->users->last_name }}</div>
                                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{ $comment->created_at }}</time>
                                </header>
                                <div class="comment-post">
                                    <p>
                                        {{ $comment->text }}
                                    </p>
                                </div>
                                <p class="text-right">
                                    <a href="#collapseMyComment{{ $loop->index }}" class="btn btn-primary btn-sm"
                                role="button" data-toggle="collapse" aria-expanded="false"
                                aria-controls="collapseExample">
                                        <i class="fa fa-reply"></i>
                                        reply
                                    </a>
                                </p>
                                <div class="collapse" id="collapseMyComment{{ $loop->index }}">
                                    <div class="well">
                                        {{--{!! Form::open(['url' => 'sendReply']) !!}--}}
                                        {{--{!! Form::hidden('user-reply-id', $session) !!}--}}
                                        {{--{!! Form::hidden('comment_id', $comment->id) !!}--}}
                                        {{--{!! Form::hidden('page_id', $user->id) !!}--}}
                                        {{--{!! Form::textarea('comment-text', null, ['class' => 'form-control', 'rows' => '3']) !!}--}}
                                        {{--{!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}--}}
                                        {{--{!! Form::close(['url' => '#']) !!}--}}
                                        @foreach($formReply as $form)
                                            {!! $form !!}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                    @endif
                    @if($comment->page_id == $user->id && $comment->user_id != $user->id)
                    <!-- Third Comment -->
                    <article class="row">
                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow right">
                                <div class="panel-body">
                                    <header class="text-right">
                                        <div class="comment-user"><i class="fa fa-user"></i> {{ $comment->users->first_name }} {{ $comment->users->last_name }}</div>
                                        <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>{{ $comment->created_at }}</time>
                                    </header>
                                    <div class="comment-post">
                                        <p>
                                            {{ $comment->text }}
                                        </p>
                                    </div>
                                    <p class="text-right">
                                        <a href="#collapseReplyThird{{ $loop->index }}" class="btn btn-primary btn-sm"
                                           role="button" data-toggle="collapse" aria-expanded="false"
                                           aria-controls="collapseExample">
                                            <i class="fa fa-reply"></i>
                                            reply
                                        </a>
                                    </p>
                                    <div class="collapse" id="collapseReplyThird{{ $loop->index }}">
                                        <div class="well">
                                            {{--{!! Form::open(['url' => 'sendReply']) !!}--}}
                                            {{--{!! Form::hidden('user-reply-id', $session) !!}--}}
                                            {{--{!! Form::hidden('comment_id', $comment->id) !!}--}}
                                            {{--{!! Form::hidden('page_id', $user->id) !!}--}}
                                            {{--{!! Form::textarea('comment-text', null, ['class' => 'form-control', 'rows' => '3']) !!}--}}
                                            {{--{!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}--}}
                                            {{--{!! Form::close(['url' => '#']) !!}--}}
                                            @foreach($formReply as $form)
                                                {!! $form !!}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <figure class="thumbnail">
                                {{--<img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />--}}
                                <img class="img-responsive" src="/images/uploads/{{ $comment->users->photo->link }}" />
                                <figcaption class="text-center">{{ $comment->users->first_name }}</figcaption>
                            </figure>
                        </div>
                    </article>
                    @endif
                {{--@endforeach--}}
                <!-- Second Comment Reply -->
                @if(!empty($replies))
                    @foreach($replies as $reply)
                        @if($reply->comment_id == $comment->id)
                <article class="row">
                    <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
                        <figure class="thumbnail">
                            {{--<img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />--}}
                            <img class="img-responsive" src="/images/uploads/{{ $reply->users->photo->link }}" />
                            <figcaption class="text-center">{{ $reply->users->first_name }}</figcaption>
                        </figure>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <div class="panel panel-default arrow left">
                            <div class="panel-heading right">Reply</div>
                            <div class="panel-body">
                                <header class="text-left">
                                    <div class="comment-user">
                                        <i class="fa fa-user"></i>
                                        {{ $reply->users->first_name }} {{ $reply->users->last_name }}
                                    </div>
                                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{ $reply->created_at }}</time>
                                </header>
                                <div class="comment-post">
                                    <p>
                                        {{ $reply->text }}
                                    </p>
                                </div>
                                <p class="text-right">
                                    <a href="#collapseReply{{ $loop->index }}" class="btn btn-primary btn-sm"
                                       role="button" data-toggle="collapse" aria-expanded="false"
                                       aria-controls="collapseExample">
                                        <i class="fa fa-reply"></i>
                                        reply
                                    </a>
                                </p>
                                <div class="collapse" id="collapseReply{{ $loop->index }}">
                                    <div class="well">
                                        {{--{!! Form::open(['url' => 'sendReply']) !!}--}}
                                        {{--{!! Form::hidden('user-reply-id', $session) !!}--}}
                                        {{--{!! Form::hidden('comment_id', $reply->comments->id) !!}--}}
                                        {{--{!! Form::hidden('page_id', $user->id) !!}--}}
                                        {{--{!! Form::textarea('comment-text', null, ['class' => 'form-control', 'rows' => '3']) !!}--}}
                                        {{--{!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}--}}
                                        {{--{!! Form::close() !!}--}}
                                        @foreach($formReply as $form)
                                            {!! $form !!}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                {{--@endif--}}
            </section>
        @endif
        </div>
    </div>
</div>