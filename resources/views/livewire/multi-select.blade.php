<div>
    <div class="flex w-60 justify-center border">

        <div id="wrapper"
            x-data="{ open: false, selectedOptions: @entangle('selectedOptions') }">

            <input type="text"
                @click="open = true"
                :value="$wire.getSelectedOptionNames">

            <div x-show="open"
                @click.outside="open = false">

                <template x-for="option in $wire.allOptions"
                    :key="option.id"
                    x-show="open"
                    @click.outside="open = false">

                    <div class="flex p-2">
                        <input type="checkbox"
                            class="mr-2"
                            :value="option.id"
                            x-model="$wire.selectedOptions">
                        <li x-text="option.name"
                            class="list-none"></li>
                    </div>
                </template>

            </div>
        </div>
    </div>
    <button wire:click="submit">call</button>
</div>
