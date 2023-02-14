<div style="text-align:center">
    hello,i'm counter view and the counter is {{$counterFromCount}}
    <x-progress/>
    <x-input.datepicker/>

    <livewire:counter/>

    <button wire:click="openModal" class="bg-blue-500 text-white py-2 px-4 rounded">
        Open Modal
    </button>

    <x-modal />
</div>
