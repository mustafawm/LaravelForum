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