<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @include('layouts.front.css')

    </head>
    <body>
    <!-- preloader -->
{{--    <div id="preloader">--}}
{{--        <div id="loading-center">--}}
{{--            <div id="loading-center-absolute">--}}
{{--                <div class="object" id="object_one"></div>--}}
{{--                <div class="object" id="object_two"></div>--}}
{{--                <div class="object" id="object_three"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->
    @include('layouts.front.header')
                {{ $slot }}
    @include('layouts.front.footer')
    @include('layouts.front.script')
    </body>
</html>
