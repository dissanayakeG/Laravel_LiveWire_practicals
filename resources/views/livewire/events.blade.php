<div style="text-align:center">

    <livewire:counter />

    <button wire:click="openModal" class="bg-blue-500 text-white py-2 px-4 rounded">
        Open Modal
    </button>

    <x-middle-modal />

    </br>
    </br>

    <p>Below is extracted Alpine component</p>

    <x-input-counter wire:model="quantity" />

</div>
