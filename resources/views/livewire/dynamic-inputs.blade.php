<div>
    <x-button wire:click.prevent="addRow">Add row</x-button>

    <form wire:submit.prevent="submit">
        <div class="mt-6 flex">
            <div class="py-2 px-3 text-gray-700 leading-tight" style="width: 33%;">Name</div>
            <div class="py-2 px-3 text-gray-700 leading-tight" style="width: 33%;">Address</div>
            <div class="py-2 px-3 text-gray-700 leading-tight" style="width: 33%;">Age</div>
        </div>

        @foreach ($this->formData as $index => $item)
            <div class="mt-6 flex   " wire:key="{{ 'row_' . $index }}">
                <div class="mr-2" style="width: 33%;">
                    <x-input type="text" wire:model="formData.{{ $index }}.name"
                        value="{{ $item['name'] }}" /></br>
                    @error('formData.' . $index . '.name')
                        <span class="text-red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mr-2" style="width: 33%;">
                    <x-input type="text" wire:model="formData.{{ $index }}.address"
                        value="{{ $item['address'] }}" /></br>
                    @error('formData.' . $index . '.address')
                        <span class="text-red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mr-2" style="width: 33%;">
                    <x-input type="text" wire:model="formData.{{ $index }}.age"
                        value="{{ $item['age'] }}" /></br>
                    @error('formData.' . $index . '.age')
                        <span class="text-red">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="button" wire:click.prevent="deleteRow({{ $index }})"
                        class="text-white bg-red-700 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2">X</button>
                </div>

            </div>
        @endforeach

        <x-button class="mt-4" type="submit">Submit</x-button>
    </form>

    <style>
        .text-red {
            color: red;
        }
    </style>
</div>
