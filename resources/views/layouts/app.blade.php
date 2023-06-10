<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tiny.cloud/1/g6okvokn88t9v398bwbnryk9i0ixpaz3jgx2m3n0sdgj4ayd/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Scripts -->
    @include('layouts.front.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<button class="scroll__top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
</button>

<!-- Page Content -->
<div class="wrapper">
    @include('layouts.front.header')
    {{ $slot }}
    @include('layouts.front.footer')
    @include('layouts.front.script')
</div>

</body>
</html>
