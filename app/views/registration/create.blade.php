@extends('layouts.default')

@section('content')
    <h1>Register!</h1>
    {{ Form::open(['route' => 'register_path']) }}
     <div class="form-group">
         {{ Form::label('Username', 'Username:') }}
         {{ Form::text('Username', null, ['class' => 'form-control']) }}
     </div>

    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('Email', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Password:') }}
        {{ Form::password('Password', ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('password_confirmation', 'Password_confirmation:') }}
        {{ Form::password('Password_Confirmation', ['class' => 'form-control']) }}
    </div>
    {{ Form::close() }}

    <div class="form-group">
        {{ Form::submit('Sign Up', ['class' => 'btn btn-primary']) }}
    </div>
@stop