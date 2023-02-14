<div style="text-align:center">
    hello,i'm counter view and the counter is {{$counterFromCount}}

    <livewire:counter/>

    <button wire:click="openModal" class="bg-blue-500 text-white py-2 px-4 rounded">
        Open Modal
    </button>

    <x-middle-modal :name="$modalData['name']" :modal-data="$modalData" />
</div>
