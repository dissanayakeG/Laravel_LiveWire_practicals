<div>
    <p class="mb-4">Access  $this->fluentApi  computed property...</p>

    <div class="break-after-all mb-4">{{ $this->fluentApi }}</div>

    @foreach ($ages as $index => $age)
        <input wire:model="ages.{{ $index }}" class="h-10 px-3 rounded-full border-gray-300 text-sm focus:outline-none mb-4" type="text">
    @endforeach

    <p class="mb-4">Two way data binding...</p>

    <pre><?php print_r($ages); ?></pre>
</div>
