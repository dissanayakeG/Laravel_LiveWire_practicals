<div class="container">
    <form class="flex items-center">
        <div class="flex items-center">
            {{--        <input type="text" class="form-control" id="comment" wire:model.debounce.1000ms="newComment"> --}}
            <input class="h-10 px-3 rounded-full border-gray-300 text-sm focus:outline-none" type="text" id="comment"
                placeholder="Enter some comment" wire:model.debounce.lazy="newComment">

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                wire:click.prevent="addComment">Submit</button>
        </div>
    </form>
    <div class="container">
        @error('newComment')
            <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div class="container" style="margin-top: 20px">
        @foreach ($this->comments as $comment)
            <div class="data-wrapper">
                <div class="p-2">
                    <h4>{{ $comment->creator?->name }}</h4>
                    <h6>{{ $comment->created_at->diffForHumans() }}</h6>
                    <h5>{{ $comment->body }}</h5>
                </div>
                <button wire:key="'delete-button-'.{{ $comment->id }}" class="text-red-600 delete-btn"
                    wire:click="deleteComment({{ $comment->id }})">X</button>
            </div>
        @endforeach
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

        .delete-btn {
            cursor: pointer;
            height: fit-content;
        }
    </style>
</div>
