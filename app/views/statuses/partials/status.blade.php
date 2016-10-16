<article class="media status-media">
    <div class="pull-left">
        @include('statuses.partials.avatar', ['user' => $status->user])
    </div>

    <div class="media-body status-media-body">
        <h4 lass="media-heading status-media-heading"> {{ $status->user->username }} </h4>
        <time class="status-media-time"> {{ $status->present()->timeSincePublished() }} </time>
        {{ $status->body }}

        {{--@include('users.partials.follow-form', ['user' => $status->user])--}}
    </div>
</article>