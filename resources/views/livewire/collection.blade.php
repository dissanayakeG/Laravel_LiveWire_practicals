<div>
    <p class="mb-4 text-green-600">Access $this->fluentApi computed property...</p>

    <div class="break-after-all mb-4">{{ $this->fluentApi }}</div>

    @foreach ($ages as $index => $age)
        <input wire:model="ages.{{ $index }}"
            class="h-10 px-3 rounded-full border-gray-300 text-sm focus:outline-none mb-4" type="text">
    @endforeach

    <p class="mb-4 text-green-600">Two way data binding...</p>

    <pre><?php print_r($ages); ?></pre>



    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">CheckBoxes</h3>
    <ul
        class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        @foreach ($technologies as $index => $technoloy)
            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                <div class="flex items-center pl-3">

                    <input id="{{ $technoloy }}" type="checkbox" value="{{ $technoloy }}"
                        wire:model="technologies.{{ $index }}"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 
                                dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">

                    <label for="vue-checkbox"
                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $technoloy }}</label>

                </div>
            </li>
        @endforeach
    </ul>

    <pre><?php print_r($technologies); ?></pre>

</div>
