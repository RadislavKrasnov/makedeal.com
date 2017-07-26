@extends('index')
@section('title', 'profile')
    @section('profile-css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
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
                                    {!! Form::submit('Remove') !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {!! Form::open(['url' => 'addTech']) !!}
                    {!! Form::hidden('user_id', $user->id) !!}
                    {!! Form::select('techIds', $user->notAddedTechs(),
                    ['class' => 'form-control'], ['class' => 'form-control']) !!}
                    {!! Form::submit('Add') !!}
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
                                    {!! Form::submit('Remove') !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {!! Form::open(['url' => '/project', 'method' => 'GET']) !!}
                    {!! Form::hidden('user_id', $user->id) !!}
                    {!! Form::submit('Add project') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection