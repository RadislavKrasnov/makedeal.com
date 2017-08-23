@extends('layouts.index')
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
                        <img src="http://via.placeholder.com/250x250">
                    </a>
                </div>
                <div class="dev-info-profile">
                    <div class="header-developer-profile">
                        <h4>{{ $user->first_name }} {{ $user->last_name }}</h4>
                    </div>
                    @if($user->id != $session)
                    <div class="info-list">
                        @foreach($user->specialization() as $specialization)
                        <p>Scpecialization: {{ $specialization->title }}</p>
                        @endforeach
                        @if ($user->experience !== 0)
                            <p>expereince: {{ $user->experience }} years</p>
                        @else
                            <p>expereince: less 1 years</p>
                        @endif
                        <p>Age: {{ $user->birthday }}</p>
                    </div>
                    @else
                        <div class="info-list">
                            @foreach($user->specialization() as $specialization)
                                <p>Scpecialization: {{ $specialization->title }}</p>
                            @endforeach
                            @if ($user->experience !== 0)
                                <p>expereince: {{ $user->experience }} year(s)</p>
                            @else
                                <p>expereince: less 1 year</p>
                            @endif
                            <p>Age: {{ $user->birthday }}</p>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#editInfo" aria-expanded="false" aria-controls="collapseExample">
                                Edit
                            </button>
                            <div class="collapse" id="editInfo">
                                <div class="well">
                                    {!! Form::open(['url' => '/user-info', 'method' => 'PUT']) !!}
                                    {!! Form::hidden('user_id', $user->id) !!}
                                    {!! Form::label('Specialization') !!}
                                    {!! Form::select('specialization', $user->jobs->scopeSpecializationsArray(), $user->jobs_id,
                                    ['class' => 'form-control']) !!}
                                    {!! Form::label('Start career') !!}
                                    {!! Form::text('experience', null, ['class' => 'form-control',
                                    'placeholder' => 'mm/dd/YYYY']) !!}
                                    {!! Form::label('Date of birth') !!}
                                    {!! Form::text('birthday', null, ['class' => 'form-control',
                                    'placeholder' => 'mm/dd/YYYY']) !!}
                                    {!! Form::submit('Save', ['class' => 'btn btn-primary'])  !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    @endif
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Contacts
                    </button>
                    @if($user->id != $session)
                    <div class="collapse" id="collapseExample">
                        <div class="well">
                            <p>Email: {{ $user->email }}</p>
                            <p>GitHub: {{ $user->github }}</p>
                            <p>Skype: {{ $user->skype }}</p>
                            <p>Google+: {{ $user->google_plus }}</p>
                            <p>Facebook: {{ $user->facebook }}</p>
                            <p>Phone: {{ $user->phone }}</p>
                            <p>Portfolio: {{ $user->portfolio }}</p>
                        </div>
                    </div>
                    @else
                    <div class="collapse" id="collapseExample">
                        <div class="well">
                                {!! Form::open(['url' => '/add_email']) !!}
                                    {!! Form::token() !!}
                                    {!! Form::hidden('user_id', $user->id) !!}
                                    {!! Form::label('Email') !!}
                                    {!! Form::text('email', !empty($user->email) ? $user->email : null,
                                    ['class' => 'form-control', 'id' => 'email']) !!}
                                    {!! Form::submit('Edit', ['class' => 'btn btn-primary'])  !!}
                                {!! Form::close() !!}
                                {!! Form::open(['url' => '/add_contacts']) !!}
                                    {!! Form::token() !!}
                                    {!! Form::hidden('user_id', $user->id) !!}
                                    {!! Form::label('GitHub') !!}
                                    {!! Form::text('github', !empty($user->contact->github) ? $user->contact->github : null,
                                    ['class' => 'form-control']) !!}
                                    {!! Form::label('Skype') !!}
                                    {!! Form::text('skype', !empty($user->contact->skype) ? $user->contact->skype : null,
                                    ['class' => 'form-control']) !!}
                                    {!! Form::label('Google+') !!}
                                    {!! Form::text('google_plus', !empty($user->contact->google_plus) ? $user->contact->google_plus : null,
                                    ['class' => 'form-control']) !!}
                                    {!! Form::label('Facebook') !!}
                                    {!! Form::text('facebook', !empty($user->contact->facebook) ? $user->contact->facebook : null,
                                    ['class' => 'form-control']) !!}
                                    {!! Form::label('Phone') !!}
                                    {!! Form::text('phone',  !empty($user->contact->phone) ? $user->contact->phone : null,
                                    ['class' => 'form-control']) !!}
                                    {!! Form::label('Portfolio') !!}
                                    {!! Form::text('portfolio',  !empty($user->contact->portfolio) ? $user->contact->portfolio : null,
                                    ['class' => 'form-control']) !!}
                                    {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="techs-skills">
                <div class="table-responsive">
                @if(count($user->technologies) > 0)
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            @if ($user->id == $session)
                            <th>Remove</th>
                            @endif
                        </tr>
                        @foreach($user->technologies as $technology)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $technology->title }}</td>
                            @if ($user->id == $session)
                            <td>
                                {!! Form::open(['url' => 'removeTech']) !!}
                                    {!! Form::hidden('user_id', $user->id) !!}
                                    {!! Form::hidden('tech_id', $technology->id) !!}
                                    {!! Form::submit('Remove', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                @else
                <div class="empty-table"><span>You don't have any record now</span></div>
                @endif

                    @if ($user->id == $session)
                    {!! Form::open(['url' => 'addTech']) !!}
                    {!! Form::hidden('user_id', $user->id) !!}
                    {!! Form::select('techIds', $user->notAddedTechs(),
                    ['class' => 'form-control'], ['class' => 'form-control']) !!}
                    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    @endif
                </div>
            </div>
            <div class="companies">
                <div class="table-responsive">
                @if(count($user->companies) > 0)
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Location</th>
                            @if ($user->id == $session)
                            <th>Remove</th>
                            @endif
                        </tr>
                        @foreach($user->companies as $company)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $company->title }}</td>
                                <td>{{ $company->location }}</td>
                                @if ($user->id == $session)
                                <td>
                                    {!! Form::open(['url' => 'companyDelete', 'method' => 'post']) !!}
                                    {!! Form::hidden('user_id', $user->id) !!}
                                    {!! Form::hidden('company_id', $company->id) !!}
                                    {!! Form::submit('Remove', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                @else
                    <div class="empty-table"><span>You don't have any record now</span></div>
                @endif
                    @if ($user->id == $session)
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCompany"
                            aria-expanded="false" aria-controls="collapseExample">
                        Add company
                    </button>
                    <div class="collapse" id="collapseCompany">
                        <div class="well">
                            {!! Form::open(['url' => '/company']) !!}
                            {!! Form::hidden('user_id', $user->id) !!}
                            {!! Form::label('Company name') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            {!! Form::label('Location') !!}
                            {!! Form::text('location', null, ['class' => 'form-control']) !!}
                            {!! Form::submit('Add company', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="projects">
                <div class="table-responsive">
                @if(count($user->projects) > 0)
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Descroption</th>
                            <th>Completed</th>
                            @if ($user->id == $session)
                            <th>Remove</th>
                            @endif
                        </tr>
                        @foreach($user->projects as $project)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->completed }}</td>
                                @if ($user->id == $session)
                                <td>
                                    {!! Form::open(['url' => '/projectDelete', 'method' => 'post']) !!}
                                    {!! Form::hidden('user_id', $user->id) !!}
                                    {!! Form::hidden('project_id', $project->id) !!}
                                    {!! Form::submit('Remove', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                @else
                    <div class="empty-table"><span>You don't have any record now</span></div>
                @endif
                    @if ($user->id == $session)
                    {!! Form::open(['url' => '/project', 'method' => 'GET']) !!}
                    {!! Form::hidden('user_id', $user->id) !!}
                    {!! Form::submit('Add project', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{--comments--}}
@include('comments')
@endsection