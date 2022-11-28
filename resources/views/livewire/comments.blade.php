<div class="container">

    <form class="container form-inline" style="margin-top: 20px" wire:submit.prevent="addComment">
        <div class="form-group">
            {{--        <input type="text" class="form-control" id="comment" wire:model.debounce.1000ms="newComment">--}}
            <input type="text" class="form-control input-lg" id="comment" wire:model.debounce.lazy="newComment">
        </div>
        <button wire:click="addComment" class="btn btn-primary">Submit</button>
    </form>

    <div class="container">
        @error('newComment') <span class=" text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="container" style="margin-top: 20px">
        <div>
            @foreach($comments as $comment)
                <div class="border">
            <span class="form-control" style="height: auto; margin-bottom: 20px">
                <h4>{{$comment->creator->name}}</h4> <h6>{{$comment->created_at->diffForHumans()}}</h6>
                {{$comment->body}}
            </span>
                </div>
            @endforeach
        </div>
    </div>
</div>

