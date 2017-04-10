<div class="row">
    <div class="col-md-8 col-md-offset-2">
        @foreach($thread->replies as $reply)
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $reply->updated_at->diffForHumans() }}
                <a href="#">{{ $reply->owner->name }}</a> wrote...
            </div>
            <div class="panel-body">
                {{ $reply->body }}
            </div>
        </div>
        @endforeach
    </div>
</div>