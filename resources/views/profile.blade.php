@extends('index')
@section('title', 'profile')
    @section('profile-css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/comments.css') }}">
    @endsection
@section('content')

    <div class="row marketing">
        <div class=".col-xs-12 .col-sm-12 .col-md-12 col-lg-12">
            <a href="{{ route('developers') }}" class="btn btn-primary back">Back</a>
            <div class="developer-profile clearfix">
                <div class="avatar-profile">
                    <a href="https://placeholder.com">
                        <img src="http://via.placeholder.com/250x350">
                    </a>
                </div>
                <div class="dev-info-profile">
                    <div class="header-developer-profile">
                        <h4>{{ $user->first_name }} {{ $user->last_name }}</h4>
                    </div>
                    <div class="info-list">
                        @foreach($user->specialization() as $specialization)
                        <p>Scpecialization: {{ $specialization->title }}</p>
                        @endforeach
                        @if ($user->experience !== 0)
                            <p>expereince: {{ $user->experience }} years</p>
                        @else
                            <p>expereince: less 1 years</p>
                        @endif
                        <p>Age: {{ $user->age }}</p>
                    </div>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Contacts
                    </button>
                    <div class="collapse" id="collapseExample">
                        <div class="well">
                            @foreach($user->contact() as $contact)
                            <p>Email: {{ $contact->email }}</p>
                            <p>GitHub: {{ $contact->github }}</p>
                            <p>Skype: {{ $contact->skype }}</p>
                            <p>Google+: {{ $contact->google_plus }}</p>
                            <p>Facebook: {{ $contact->facebook }}</p>
                            <p>Phone: {{ $contact->phone }}</p>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <div class="techs-skills">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Remove</th>
                        </tr>
                        @foreach($user->technologies as $technology)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $technology->title }}</td>
                            <td>
                                {!! Form::open(['url' => 'removeTech']) !!}
                                    {!! Form::hidden('user_id', $user->id) !!}
                                    {!! Form::hidden('tech_id', $technology->id) !!}
                                    {!! Form::submit('Remove', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {!! Form::open(['url' => 'addTech']) !!}
                    {!! Form::hidden('user_id', $user->id) !!}
                    {!! Form::select('techIds', $user->notAddedTechs(),
                    ['class' => 'form-control'], ['class' => 'form-control']) !!}
                    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="projects">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Descroption</th>
                            <th>Completed</th>
                            <th>Remove</th>
                        </tr>
                        @foreach($user->projects as $project)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->completed }}</td>
                                <td>
                                    {!! Form::open(['url' => '/projectDelete', 'method' => 'post']) !!}
                                    {!! Form::hidden('user_id', $user->id) !!}
                                    {!! Form::hidden('project_id', $project->id) !!}
                                    {!! Form::submit('Remove', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {!! Form::open(['url' => '/project', 'method' => 'GET']) !!}
                    {!! Form::hidden('user_id', $user->id) !!}
                    {!! Form::submit('Add project', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="page-header">Comments</h2>
                <section class="comment-list">
                    <!-- First Comment -->
                    <article class="row">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <figure class="thumbnail">
                                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                                <figcaption class="text-center">username</figcaption>
                            </figure>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                    <header class="text-left">
                                        <div class="comment-user"><i class="fa fa-user"></i> That Guy</div>
                                        <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time>
                                    </header>
                                    <div class="comment-post">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                    </div>
                                    <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <!-- Second Comment Reply -->
                    <article class="row">
                        <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
                            <figure class="thumbnail">
                                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                                <figcaption class="text-center">username</figcaption>
                            </figure>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <div class="panel panel-default arrow left">
                                <div class="panel-heading right">Reply</div>
                                <div class="panel-body">
                                    <header class="text-left">
                                        <div class="comment-user"><i class="fa fa-user"></i> That Guy</div>
                                        <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time>
                                    </header>
                                    <div class="comment-post">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                    </div>
                                    <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <!-- Third Comment -->
                    <article class="row">
                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow right">
                                <div class="panel-body">
                                    <header class="text-right">
                                        <div class="comment-user"><i class="fa fa-user"></i> That Guy</div>
                                        <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time>
                                    </header>
                                    <div class="comment-post">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                    </div>
                                    <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <figure class="thumbnail">
                                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                                <figcaption class="text-center">username</figcaption>
                            </figure>
                        </div>
                    </article>
                </section>
            </div>
        </div>
    </div>


@endsection