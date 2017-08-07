@extends('index')
@section('title', 'New project')
@section('profile-css')
<link rel="stylesheet" href="{{ asset('css/project.css') }}">
@endsection
@section('content')
    <a href="{{ route('profile', [$user->id]) }}" class="btn btn-primary back">Back</a>
    {!! Form::open(['url' => '/add_project']) !!}
    {!! Form::hidden('user_id', $user->id) !!}
    {!! Form::label('Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=> 'Title']) !!}
    {!! Form::label('Description') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '10', 'cols' => '5'])!!}
    {!! Form::label('Completed') !!}<br>
    {!! Form::text('completed', null, ['class' => 'form-control date', 'placeholder' => 'YYYY-MM-DD']) !!}
    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    @if (!empty($result))
        {{ $result }}
    @endif
@endsection