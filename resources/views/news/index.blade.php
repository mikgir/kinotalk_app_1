<x-guest-layout>
    <!-- breadcrumb-area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content-news">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('main')}}">Главная</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Новости</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- main-area -->
    <main>
{{--        {{ dd($categories, $news) }}--}}
        <!-- popular-area -->
        @foreach($categories as $key=>$category)
            <section class="@if($category->id % 2 === 0) latest-post-area pt-80 pb-80
                            @else popular__post-area lifestyle__popular-area white-bg section__hover-line pt-75 pb-75
                            @endif">

                <div class="container">
                    <div class="section__title-wrap mb-40">
                        <div class="row align-items-end">
                            <div class="col-sm-6">
                                <div class="section__title">
                                    <h3 class="section__main-title">{{$category->name}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="trending__slider">
                        <div class="swiper-container popular-active">
                            <div class="swiper-wrapper">
                                @foreach($category->news as $key=>$item)
                                    <div class="swiper-slide">
                                        <div class="trending__post">
                                            <div class="trending__post-thumb tgImage__hover">
                                                <a href="{{route('news.show', $item->id)}}" class="image">
                                                    <img src="{{asset($item->image)}}" alt="img">
                                                </a>
                                            </div>
                                            <div class="trending__post-content">
                                                <h4 class="title tgcommon__hover"><a href="{{route('news.show', $item->id)}}">{{$item->title}}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    @endforeach

    </main>
</x-guest-layout>
