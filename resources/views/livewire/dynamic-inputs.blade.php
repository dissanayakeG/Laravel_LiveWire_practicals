<div>
    <x-button wire:click.prevent="addRow">Add row</x-button>

    <form wire:submit.prevent="submit">

        @foreach ($this->formData as $index => $item)
            <div class="mt-6 flex ">
                <div>
                    <x-input type="text" wire:model="formData.{{ $index }}.name"
                        value="{{ $item['name'] }}" /></br>
                    @error('formData.' . $index . '.name')
                        <span class="text-red">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <x-input type="text" wire:model="formData.{{ $index }}.address"
                        value="{{ $item['address'] }}" /></br>
                    @error('formData.' . $index . '.address')
                        <span class="text-red">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <x-input type="text" wire:model="formData.{{ $index }}.age"
                        value="{{ $item['age'] }}" /></br>
                    @error('formData.' . $index . '.age')
                        <span class="text-red">{{ $message }}</span>
                    @enderror
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
