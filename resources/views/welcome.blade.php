<x-app-layout>
    <div>
        {{--        <x-collection-practical/>--}}
        <x-progress/>
        <x-input.datepicker/>

        <livewire:counter/>
        <livewire:events/>
        {{--        <livewire:comments comment="Here is a new comment, passing as a vueJs props, you can catch this from mount function"/>--}}
        {{--        <livewire:comments :commentsAsProp="$commentsFromWebPHP"/>--}}
        <livewire:comments/>
    </div>
</x-app-layout>
