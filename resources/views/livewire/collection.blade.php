<div>
    <p class="mb-4 text-green-600">Two way data binding</p>
    @foreach ($ages as $index => $age)
        <input wire:model.live="ages.{{ $index }}" wire:key="{{ $index }}
            class="h-10 px-3
            rounded-full border-gray-300 text-sm focus:outline-none mb-4" type="text">
    @endforeach
    @php dump($ages); @endphp

    <p class="mb-4 text-green-600">CheckBoxes data binding</p>
    <ul
        class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        @foreach ($technologies as $technoloy)
            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                <div class="flex items-center pl-3">

                    <input type="checkbox" value="{{ $technoloy }}" wire:model.live="selected.{{ $technoloy }}"
                        wire:key="{{ $index }}
                        class="w-4 h-4 text-blue-600 bg-gray-100
                        border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700
                        dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">

                    <label for="vue-checkbox"
                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $technoloy }}</label>

                </div>
            </li>
        @endforeach
    </ul>
    @php dump($selected); @endphp


    <p class="mb-4 text-green-600">Access $this->fluentApi computed property</p>
    <div class="break-after-all mb-4">{{ $this->fluentApi }}</div>

    <p class="mb-4 text-green-600">API data paginate</p>
    <div>
        <table class="table-auto" style="width: 100%;">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Environment</th>
                    <th class="border px-4 py-2">Level</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($logs['data'] as $log)
                    <tr>
                        <td class="border px-4 py-2">{{ $log['id'] }}</td>
                        <td class="border px-4 py-2">{{ $log['environment'] }}</td>
                        <td class="border px-4 py-2">{{ $log['level'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($logs['last_page'] > 1)
        <div class="flex justify-center mt-4">
            <nav class="block">
                <ul class="flex pl-0 rounded list-none">
                    @if ($logs['current_page'] > 1)
                        <li class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-blue border-r-0 hover:cursor-pointer"
                            wire:click.prevent="pagination({{ 1 }})">First</li>
                        <li class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-blue border-r-0 hover:cursor-pointer"
                            wire:click.prevent="pagination('{{ $logs['prev_page_url'] }}')">Previous</li>
                    @endif

                    @for ($i = 1; $i <= $logs['last_page']; $i++)
                        <li class="relative block py-2 px-3 leading-tight border border-gray-300 
                    @if ($logs['current_page'] == $i) bg-blue-600 text-white @else bg-white text-blue @endif
                    border-r-0 hover:cursor-pointer"
                            wire:click.prevent="pagination({{ $i }})">{{ $i }}</li>
                    @endfor

                    @if ($logs['current_page'] < $logs['last_page'])
                        <li class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-blue border-r-0 hover:cursor-pointer"
                            wire:click.prevent="pagination('{{ $logs['next_page_url'] }}')">Next</li>
                        <li class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-blue hover:cursor-pointer"
                            wire:click.prevent="pagination('{{ $logs['last_page_url'] }}')">Last</li>
                    @endif
                </ul>
            </nav>
        </div>
    @endif

    <p class="mb-4 text-green-600">DB model data paginate</p>

    <div>
        <table class="table-auto" style="width: 100%;">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Content</th>
                    <th class="border px-4 py-2">Created Date</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class="border px-4 py-2">{{ $post->id }}</td>
                        <td class="border px-4 py-2">{{ $post->body }}</td>
                        <td class="border px-4 py-2">{{ $post->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
