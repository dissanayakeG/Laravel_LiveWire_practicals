<div>

    <x-alpine.todo-list method="increment" />

    <div class="flex mt-6 justify-center">

        <x-alpine.multi-select :selectedOptions="$this->selectedOptions"
            :allOptions="$this->allOptions" />

        <button wire:click="submit">call</button>

    </div>
</div>
