<x-guest-layout xmlns:livewire="http://www.w3.org/1999/html">
    <livewire:styles/>
    <livewire:scripts/>
    <main>
        <!-- breadcrumb-area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('main')}}">Главная</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('news')}}">Новости</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$news->title}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->
        <!-- main-area -->

        <!-- blog-details-area -->
        <section class="blog-details-area pt-80 pb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-7">
                        <div class="blog-details-wrap">
                            <ul class="tgbanner__content-meta list-wrap">
                                <li>{{$news->created_at}}</li>
                            </ul>
                            <h2 class="title">{{$news->title}}</h2>
                            <div class="blog-details-thumb">
                                <img src="{{asset($news->image)}}" alt="img">
                            </div>
                            <div class="blog-details-content">
                                <p>{!! $news->body !!}</p>
                            </div>

                            <livewire:reactions :model="$news"/>

                            <div class="blog-details-bottom">
                                <div class="row align-items-baseline">
                                    <div class="col-xl-6 col-md-7">
                                        <div class="blog-details-tags">
                                            <ul class="list-wrap mb-0">
                                                <li><a href="{{route('news')}}">Новости</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <livewire:comments :model="$news"/>
                            <script>
                                window.addEventListener('closeModal', event => {
                                    $('[id*="modalForm"]').modal('hide');
                                })
                            </script>

                            <div class="blog-prev-next-posts">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-8 col-md-6">
                                        <div class="pn-post-item">
                                            <div class="thumb">
                                                <a href="news-details.html"><img
                                                            src="{{asset('build/assets/src/assets/img/news/call.png')}}"
                                                            alt="img"></a>
                                            </div>
                                            <div class="content">
                                                <span>Предыдущая новость</span>
                                                <h5 class="title tgcommon__hover news_text__w3">
                                                    <a href="news-details.html">Уникальный
                                                        российский кинопроект "Вызов"...</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-8 col-md-6">
                                        <div class="pn-post-item next-post">
                                            <div class="thumb">
                                                <a href="news-details.html"><img
                                                            src="{{asset('build/assets/src/assets/img/news/Afterburner.png')}}"
                                                            alt="img"></a>
                                            </div>
                                            <div class="content">
                                                <span>Следующая новость</span>
                                                <h5 class="title tgcommon__hover news_text__w3">
                                                    <a href="news-details.html">"Форсаж".
                                                        История семьи Доминика Торетто.</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <aside class="blog-sidebar">
                            <div class="widget sidebar-widget widget_categories">
                                <h4 class="widget-title">Популярная категория</h4>
                                <ul class="list-wrap">
                                    <li>
                                        <div class="thumb"><a href="news.html"><img
                                                        src="{{asset('build/assets/src/assets/img/category/Mira.png')}}"
                                                        alt="img"></a></div>
                                        <a href="news.html">Кино</a>
                                        <span class="float-right">12</span>
                                    </li>
                                    <li>
                                        <div class="thumb"><a href="news.html"><img
                                                        src="{{asset('build/assets/src/assets/img/category/Sansara.png')}}"
                                                        alt="img"></a></div>
                                        <a href="news.html">Сериалы</a>
                                        <span class="float-right">10</span>
                                    </li>
                                    <li>
                                        <div class="thumb"><a href="news.html"><img
                                                        src="{{asset('build/assets/src/assets/img/category/GuardiansOfTheGalaxy.png')}}"
                                                        alt="img"></a></div>
                                        <a href="news.html">Комиксы</a>
                                        <span class="float-right">08</span>
                                    </li>
                                    <li>
                                        <div class="thumb"><a href="news.html"><img
                                                        src="{{asset('build/assets/src/assets/img/category/HarryPotter.png')}}"
                                                        alt="img"></a></div>
                                        <a href="news.html">Франшизы</a>
                                        <span class="float-right">06</span>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-details-area-end -->
    </main>
</x-guest-layout>
