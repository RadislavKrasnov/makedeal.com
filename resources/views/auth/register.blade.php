{{--@extends('layouts.app')--}}
@extends('layouts.index')
@section('register-css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection
@section('content')
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first-name" class="col-md-4 control-label">First name *</label>

                            <div class="col-md-6">
                                <input id="first-name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last name *</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username *</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password *</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password *</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email *</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="birthday" class="col-md-4 control-label">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="birthday" type="text" class="form-control" name="birthday"
                                       placeholder="mm/dd/YYYY">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="experience" class="col-md-4 control-label">Start career *</label>

                            <div class="col-md-6">
                                <input id="experience" type="text" class="form-control" name="experience"
                                       placeholder="mm/dd/YYYY">
                            </div>
                        </div>

                        <div class="form-group">
                            {{--<label for="country" class="col-md-4 control-label">Country</label>--}}
                            {!! Form::label('country', 'Country *', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {{--<input id="country" type="text" class="form-control" name="countries_id">--}}
                                {!! Form::select('country', $countriesArray, null, ['class' => 'form-control']) !!}

                            </div>
                        </div>

                        <div class="form-group">
                            {{--<label for="region" class="col-md-4 control-label">Region</label>--}}
                            {!! Form::label('region', 'Region *', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {{--<input id="region" type="text" class="form-control" name="regions_id">--}}
                                {!! Form::select('region', ['def' => 'Select country first'], null, ['class' => 'form-control']) !!}

                            </div>
                        </div>

                        <div class="form-group">
                            {{--<label for="cities" class="col-md-4 control-label">City</label>--}}
                            {!! Form::label('city', 'City *', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {{--<input id="cities" type="text" class="form-control" name="cities_id">--}}
                                {!! Form::select('city', ['def' => 'Select region first'], null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                                {{--<label for="jobs" class="col-md-4 control-label">Job</label>--}}
                            {!! Form::label('jobs_id', 'Specialization *', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {{--<input id="jobs" type="text" class="form-control" name="jobs_id">--}}
                                {!! Form::select('jobs_id', $jobsArray, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
@section('register-js')
<script src="{{ asset('js/dropdown-list.js') }}"></script>
@endsection
