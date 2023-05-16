@extends('layouts.guest')


{{--    @section('preloader')--}}
{{--        <!-- preloader -->--}}
{{--        <div id="preloader">--}}
{{--            <div id="loading-center">--}}
{{--                <div id="loading-center-absolute">--}}
{{--                    <div class="object" id="object_one"></div>--}}
{{--                    <div class="object" id="object_two"></div>--}}
{{--                    <div class="object" id="object_three"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- preloader-end -->--}}

{{--        <!-- Scroll-top -->--}}
{{--        <button class="scroll__top scroll-to-target" data-target="html">--}}
{{--            <i class="fas fa-angle-up"></i>--}}
{{--        </button>--}}
{{--        <!-- Scroll-top-end-->--}}
{{--    @endsection--}}

    @section('main')
        <main>
            @include('main.index')
            {{--        <livewire:front.main-page/>--}}
        </main>
    @endsection

