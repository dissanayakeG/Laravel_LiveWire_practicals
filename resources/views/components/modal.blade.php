<div x-data="{ show: false }" x-init="() => {

    window.addEventListener('showModal', (event) => {
        console.log(event.detail[0].name);

        if (@this.get('modalData').name) {
            show = true
        }
    });
}">
    <div x-show="show" @click.away="show = false"
        class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center">

        {{ $slot }}
    </div>
</div>
