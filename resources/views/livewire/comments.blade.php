<div class="container">
    <form class="flex items-center" wire:submit.prevent="addComment">
        <div class="flex items-center">

            <input class="h-10 px-3 rounded-full border-gray-300 text-sm focus:outline-none" type="text" id="comment"
                wire:dirty.class="border-yellow" placeholder="Enter some comment" wire:model.debounce.lazy="newComment">

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                type="submit">Submit</button>

            <span wire:loading>Saving...</span>

        </div>
    </form>
    <div class="container">
        @error('newComment')
            <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div class="container" style="margin-top: 20px">
        @foreach ($this->comments as $comment)
            <div class="data-wrapper" wire:key="'delete-button-'.{{ $comment->id }}">
                <div class="p-2">
                    <h4>{{ $comment->creator?->name }}</h4>
                    <h6>{{ $comment->created_at->diffForHumans() }}</h6>
                    <h5>{{ $comment->body }}</h5>
                </div>
                <button class="text-red-600 delete-btn" wire:click="deleteComment({{ $comment->id }})">X</button>
            </div>
        @endforeach
    </div>

    <style>
        .border-yellow {
            border-color: rgb(39, 243, 12) !important;
        }

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
