@extends('layouts.default')

@section('content')

    <h2>Sign In</h2>

    <div class="row">
        <div class="col-md-6">
            {{Form::open(['route'=>'login_path'])}}

            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control', 'required']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Sign In', ['class' => 'btn btn-primary']) }}
                {{ link_to('/password/remind', 'Reset Password') }}
            </div>
            {{ Form::close() }}
        </div>
    </div>

@stop