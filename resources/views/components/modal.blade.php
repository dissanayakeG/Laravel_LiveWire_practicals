<!-- modal.blade.php -->

<div x-data="{ show: false }" x-init="() => { window.addEventListener('showModal', () => { console.log(1111111111); show = true }); }" >
    <div x-show="show" @click.away="show = false" class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm" @click.stop>
            <div class="text-lg font-medium mb-4">Modal Title</div>
            <p class="text-gray-600">Modal content goes here.</p>
            <div class="flex justify-end mt-4">
                <button @click="show = false" class="bg-gray-300 text-gray-700 py-2 px-4 rounded">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

