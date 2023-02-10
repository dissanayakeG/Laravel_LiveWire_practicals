<div>
    {{ $this->fluentApi }}

    @foreach ($ages as $index => $age)
        <input wire:model="ages.{{ $index }}">
    @endforeach

    <pre><?php print_r($ages); ?></pre>
</div>
