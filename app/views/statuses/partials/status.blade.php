<article class="media status-media">
    <div class="pull-left">
        @include('statuses.partials.avatar', ['user' => $status->user])
    </div>

    <div class="media-body">
        <h4 class="media-heading"> {{ $status->user->username }} </h4>
        <p> {{ $status->present()->timeSincePublished()}} </p>
    </div>
    {{ $status->body }}
</article>