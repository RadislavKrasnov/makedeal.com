@extends('index')
@section('title', 'New project')
@section('profile-css')
    <link rel="stylesheet" href="{{ asset('css/project.css') }}">
@endsection
@section('content')
    {!! Form::open(['url' => '/add_project']) !!}
    {!! Form::hidden('user_id', $user->id) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=> 'Title']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '10'])!!}
    {!! Form::text('completed', null, ['placeholder' => 'YYYY-MM-DD']) !!}
    {!! Form::submit('Add') !!}
    {!! Form::close() !!}
    @if (!empty($result))
        {{ $result }}
    @endif
@endsection