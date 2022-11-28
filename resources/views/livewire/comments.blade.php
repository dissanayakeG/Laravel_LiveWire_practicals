<div>
<form class="container form-inline" style="margin-top: 20px" wire:submit.prevent="addComment">
    <div class="form-group">
        <label for="comment">Comment:</label>
{{--        <input type="text" class="form-control" id="comment" wire:model.debounce.1000ms="newComment">--}}
        <input type="text" class="form-control input-lg" id="comment" wire:model.debounce.lazy="newComment">
    </div>
    <button  wire:click="addComment">Submit</button>
</form>

<div class="container" style="margin-top: 20px">
    <div >
        @foreach($comments as $comment)
            <div class="border">
            <span class="form-control" style="height: auto; margin-bottom: 20px">
                {{$comment->creator->name}}
                {{$comment->created_at->diffForHumans()}}
                {{$comment->body}}
            </span>
            </div>
        @endforeach
    </div>
</div>
</div>


