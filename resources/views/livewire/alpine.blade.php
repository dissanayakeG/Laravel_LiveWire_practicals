<div>

    <x-alpine.todo-list method="increment" />

    <div class="mt-6 flex justify-center">

        <x-alpine.multi-select :selectedOptions="$this->selectedOptions"
            :allOptions="$this->allOptions" />

        <button wire:click="submit">call</button>
    </div>
</div>
