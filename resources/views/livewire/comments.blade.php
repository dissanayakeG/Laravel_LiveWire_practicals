<div class="container">
    <form class="container form-inline" style="margin-top: 20px" wire:submit.prevent="addComment">
        <div class="form-group">
            {{--        <input type="text" class="form-control" id="comment" wire:model.debounce.1000ms="newComment">--}}
            <input type="text" class="form-control input-lg" id="comment" wire:model.debounce.lazy="newComment">
        </div>
        <button wire:click="addComment" class="btn btn-primary">Submit</button>
    </form>

    <div class="container">
        @error('newComment') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="container" style="margin-top: 20px">
        @foreach($comments as $comment)

            <div class="data-wrapper">
                <div class="p-2">
                    <h4>{{$comment->creator?->name}}</h4>
                    <h6>{{$comment->created_at->diffForHumans()}}</h6>
                    <h5>{{$comment->body}}</h5>
                </div>
                <div class="text-danger delete-btn" wire:click="deleteComment({{$comment->id}})">X</div>
            </div>

        @endforeach
        {{$comments->links()}}
    </div>
</div>

<style>
    .data-wrapper {
        height: auto;
        width: 345px;
        margin-bottom: 20px;
        border: 1px solid gray;
        border-radius: 10px;
        padding: 5px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .delete-btn{
        cursor: pointer;
        height: fit-content;
    }
</style>

