@if($signedIn)
    @if($user->isFollowedBy($currentUser))
        <p>You are following {{ $user->username }}.</p>

        {{ Form::open(['method' => 'DELETE', 'route' => ['follows_path', $user->id]]) }}

        {{ Form::hidden('userIdToUnfollow', $user->id) }}
        <button type="submit" class="btn btn-danger"> UnFollow {{ $user->username }}</button>

        {{ Form::close() }}

    @else
        {{ Form::open(['route' => 'follows_path_store']) }}

        {{ Form::hidden('userIdToFollow', $user->id) }}
        <button type="submit" class="btn btn-primary"> Follow {{ $user->username }}</button>

        {{ Form::close() }}
    @endif
@endif