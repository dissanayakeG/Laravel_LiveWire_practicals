<div style="text-align:center; margin-top: 20px">
    <button wire:click.prevent="increment">+(counterUp event will be called in Events.php)</button>
    <h1>{{$counter}}</h1>
    <button wire:click="decrement">- CounterDown</button>


    <div x-data="{ open: false }" style="margin-top: 10px">
        <button @click="open = true">Show More DropDown</button>

        <ul x-show="open" @click.outside="open = false">
            <li>
                <button wire:click="archive">Archive</button>
            </li>
            <li>
                <button wire:click="delete">Delete</button>
            </li>
        </ul>
    </div>
</div>
