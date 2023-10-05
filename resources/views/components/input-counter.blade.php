<div x-data="{ count: 0 }" x-modelable="count" {{ $attributes }}>
    <button x-on:click="count--">-</button>

    <span x-text="count"></span>

    <button x-on:click="count++">+</button>

    <p> x-modelable="count" tells Alpine to look for any x-model or wire:model statements and use "count" as the data
        to bind them to.</p>
</div>
