@props(['selectedOptions', 'allOptions'])

<div class="flex w-60 justify-center border">
    <div id="wrapper"
        x-data="{
            open: false,
            selectedOptions: @entangle('selectedOptions'),
            allOptions: @entangle('allOptions'),
            selectedOptionNames: ''
        }"
        x-init="$watch('selectedOptions', value =>
            selectedOptionNames = allOptions.filter(option => selectedOptions.includes(option.id.toString()) || selectedOptions.includes(option.id)).map(option => option.name).join(', ')
        )">


        <input type="text"
            x-model="selectedOptionNames"
            @click="open = true">

        <div x-show="open"
            @click.outside="open = false">
            <template x-for="option in allOptions"
                :key="option.id"
                x-show="open"
                @click.outside="open = false">
                <div class="flex p-2">
                    <input type="checkbox"
                        class="mr-2"
                        :value="option.id"
                        x-model="selectedOptions">
                    <li x-text="option.name"
                        class="list-none"></li>
                </div>
            </template>
        </div>
    </div>
</div>
