@props(['selectedOptions', 'allOptions'])

<div class="flex w-60 justify-center">
    <div id="wrapper"
        x-data="{
            open: false,
            selectedOptions: @entangle('selectedOptions'),
            allOptions: @entangle('allOptions'),
            selectedOptionNames() {
                return this.allOptions.filter(option => this.selectedOptions.includes(option.id.toString()) ||
                    this.selectedOptions.includes(option.id)).map(option => option.name).join(', ');
            },
        }"
        x-init="$watch('selectedOptions', () =>
            selectedOptionNames()
        )">


        <input type="text"
            x-model="selectedOptionNames"
            @click="open = true"
            class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none">

        <div x-show="open"
            class="bg-white-500 mt-2 h-40 overflow-y-scroll rounded-md border p-2"
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
                        class="list-none">
                    </li>

                </div>
            </template>
        </div>
    </div>
</div>


{{-- <script>
    function getData() {
        return {
            open: false,
            selectedOptions: @entangle('selectedOptions'),
            allOptions: @entangle('allOptions'),
            get selectedOptionNames() {
                return this.allOptions.filter(option => this.selectedOptions.includes(option.id.toString()) ||
                    this.selectedOptions.includes(option.id)).map(option => option.name).join(', ');
            },
        }
    }

    function initializeData() {
        this.$watch('selectedOptions', value =>
            this.selectedOptionNames = this.allOptions.filter(option => this.selectedOptions.includes(option.id
                    .toString()) ||
                this.selectedOptions.includes(option.id)).map(option => option.name).join(', ');
        )
    }
</script> --}}
