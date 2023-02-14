<!-- modal.blade.php -->
<x-modal name="'{{ $attributes['name'] }}'">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm" @click.stop>

        <pre>{{ $attributes['name'] }} </pre>


        <div class="text-lg font-medium mb-4">Modal Title</div>
        <p class="text-gray-600">Modal content goes here.</p>
        <div class="flex justify-end mt-4">
            <button @click="show = false" class="bg-gray-300 text-gray-700 py-2 px-4 rounded">
                Close
            </button>
        </div>
    </div>

</x-modal>
