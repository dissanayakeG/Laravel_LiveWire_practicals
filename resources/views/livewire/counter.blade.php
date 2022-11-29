<div style="text-align:center; margin-top: 20px">
    <button wire:click.prevent="increment">+(counterUp event will be called in Events.php)</button>
    <h1>{{$counter}}</h1>
    <button wire:click="decrement">-</button>
</div>
