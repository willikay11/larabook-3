@extends('layouts.default')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to larabook</h1>

        <p>Welcome to the premier place to learn laravel with others, Please Sign Up</p>
        @if(! $currentUser)
            <p>
                {{ link_to_route('register_path', 'Sign Up', null, ['class' => 'btn btn-primary btn-lg']) }}
            </p>
        @endif
    </div>

@stop