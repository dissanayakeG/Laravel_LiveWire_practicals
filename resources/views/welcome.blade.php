<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>LiveWire</title>
    <livewire:styles/>
    {{--    @livewireStyles--}}
</head>

<body>
<livewire:counter/>
<livewire:events/>
{{--<livewire:comments comment="Here is a new comment, passing as a vueJs props, you can catch this from mount function"/>--}}
{{--<livewire:comments :commentsAsProp="$commentsFromWebPHP"/>--}}
<livewire:comments />
<livewire:scripts/>

{{--@livewire('counter')--}}
{{--@livewire('comments')--}}
{{--@livewireScripts--}}
{{--<livewire:scripts/>--}}
</body>
</html>
