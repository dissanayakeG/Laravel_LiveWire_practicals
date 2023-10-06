<div>
    <form wire:submit.prevent="save">
        <input type="text" wire:model="title">

        <input type="text" wire:model="content">

        <select wire:model="selectedOption">
            <option value="">Select a country</option>
            @foreach ($options as $option)
                <option value="{{ $option['id'] }}">{{ $option['name'] }}</option>
            @endforeach
        </select>

        @if ($selectedOption)
            <p>You selected: {{ $options[array_search($selectedOption, array_column($options, 'id'))]['name'] }}</p>
        @endif

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Save</button>
    </form>

    <div>
        <p class="mb-2 mt-4 text-green-600">Using Json as an API</p>

        <ul>
            @foreach ($this->users as $user)
                <li>{{ $user['name'] }} - {{ $user['email'] }}</li>
            @endforeach
        </ul>
    </div>

    @if ($this->formData)
        @foreach ($this->formData as $item)
            {{ $item }}
        @endforeach
    @endif


    <form wire:submit.prevent="modelable">
        <p class="mb-2 mt-4 text-green-600">Modelable</p>

        <livewire:todo-input wire:model="todo" /> {{ $todo }}

        <p class="mb-2 mt-4 text-green-600">Extract input into separate blade</p>

        <x-input wire:model.live="todo" class="mt-4" />{{ $todo }}


        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            type="submit">Save</button>
    </form>

</div>
