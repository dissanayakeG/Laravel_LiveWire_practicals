<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >

    <title>LiveWire</title>
    <livewire:styles/>
    {{--    @livewireStyles--}}
</head>

<body>
<div class="wrapper">
    <!-- <div class="header"><Header /></div> -->

    <div class="content">
        <div class="side-bar">
            <x-nav/>
        </div>
        <div class="dashboard">
            <div class="content-wrapper">
                <x-input.datepicker/>

                <livewire:counter/>
                <livewire:events/>
                {{--<livewire:comments comment="Here is a new comment, passing as a vueJs props, you can catch this from mount function"/>--}}
                {{--<livewire:comments :commentsAsProp="$commentsFromWebPHP"/>--}}
                <livewire:comments/>
            </div>
        </div>
    </div>
</div>

<livewire:scripts/>

{{--@livewire('counter')--}}
{{--@livewire('comments')--}}
{{--@livewireScripts--}}
{{--<livewire:scripts/>--}}

<script>
    Livewire.on('counterUp', counter => {
        console.log('counter is : ' + counter);
        swal({
            title: 'Are you sure?',
            text: 'some text here....',
            icon: 'warning',
        });
    })
</script>
</body>

</html>
