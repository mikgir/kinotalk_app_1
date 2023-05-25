<x-guest-layout>
    <main>
        <!-- breadcrumb-area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
{{--                                    <li class="breadcrumb-item"><a href="{{route('main')}}">Главная</a></li>--}}
{{--                                    <li class="breadcrumb-item"><a href="{{route('news')}}">Новости</a></li>--}}
{{--                                    <li class="breadcrumb-item active" aria-current="page">{{$news->title}}</li>--}}
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
{{--                                <li class="category"><a href="{{route('news')}}">{{$news->category->name}}</a></li>--}}
{{--                                <li>МИРА</li>--}}
                                <li>{{$news->created_at}}</li>
                            </ul>
                            <h2 class="title">{{$news->title}}</h2>
                            <div class="blog-details-thumb">
                                <img src="{{asset($news->image)}}" alt="img">
                            </div>
                            <div class="blog-details-content">
                                <p>{!! $news->body !!}</p>

                            </div>
                            <div class="blog-details-bottom">
                                <div class="row align-items-baseline">
                                    <div class="col-xl-6 col-md-7">
                                        <div class="blog-details-tags">
                                            <ul class="list-wrap mb-0">
                                                <li><a href="{{route('news')}}">Новости</a></li>
{{--                                                <li><a href="{{route('news')}}">{{$news->category->name}}</a></li>--}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="blog-avatar-wrap">
                                <div class="blog-avatar-img">
                                    <a href="#"><img src="{{asset('build/assets/src/assets/img/user/People24.png')}}" alt="img"></a>
                                </div>
                                <div class="blog-avatar-content">
                                    <p>Российский кинематограф пробивает очередное дно. Для чего вообще снять этот фильм ? Какой в нем смысл ? Непонятно.</p>
                                    <h5 class="name">Серьезный</h5>
                                </div>
                            </div>
                            <div class="blog-avatar-wrap">
                                <div class="blog-avatar-img">
                                    <a href="#"><img src="{{asset('build/assets/src/assets/img/user/People20.png')}}" alt="img"></a>
                                </div>
                                <div class="blog-avatar-content">
                                    <p>Фильм не плохой, на один раз.</p>
                                    <h5 class="name">Надежда_86</h5>
                                </div>
                            </div>
                            <div class="blog-avatar-wrap">
                                <div class="blog-avatar-img">
                                    <a href="#"><img src="{{asset('build/assets/src/assets/img/user/People16.png')}}" alt="img"></a>
                                </div>
                                <div class="blog-avatar-content">
                                    <p>Интересно, но в плане эмоций немного подкачал.</p>
                                    <h5 class="name">MAXIMUS</h5>
                                </div>
                            </div>
                            <div class="pagination__wrap-article">
                                <ul class="list-wrap">
                                    <li class="active"><a href="#">01</a></li>
                                    <li><a href="#">02</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">07</a></li>
                                    <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>

                            <div class="blog-prev-next-posts">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-8 col-md-6">
                                        <div class="pn-post-item">
                                            <div class="thumb">
                                                <a href="news-details.html"><img src="{{asset('build/assets/src/assets/img/news/call.png')}}" alt="img"></a>
                                            </div>
                                            <div class="content">
                                                <span>Предыдущая новость</span>
                                                <h5 class="title tgcommon__hover"><a href="news-details.html">Уникальный российский кинопроект "Вызов"...</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-8 col-md-6">
                                        <div class="pn-post-item next-post">
                                            <div class="thumb">
                                                <a href="news-details.html"><img src="{{asset('build/assets/src/assets/img/news/Afterburner.png')}}" alt="img"></a>
                                            </div>
                                            <div class="content">
                                                <span>Следующая новость</span>
                                                <h5 class="title tgcommon__hover"><a href="news-details.html">"Форсаж". История семьи Доминика Торетто.</a></h5>
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
                                        <div class="thumb"><a href="news.html"><img src="{{asset('build/assets/src/assets/img/category/Mira.png')}}" alt="img"></a></div>
                                        <a href="news.html">Кино</a>
                                        <span class="float-right">12</span>
                                    </li>
                                    <li>
                                        <div class="thumb"><a href="news.html"><img src="{{asset('build/assets/src/assets/img/category/Sansara.png')}}" alt="img"></a></div>
                                        <a href="news.html">Сериалы</a>
                                        <span class="float-right">10</span>
                                    </li>
                                    <li>
                                        <div class="thumb"><a href="news.html"><img src="{{asset('build/assets/src/assets/img/category/GuardiansOfTheGalaxy.png')}}" alt="img"></a></div>
                                        <a href="news.html">Комиксы</a>
                                        <span class="float-right">08</span>
                                    </li>
                                    <li>
                                        <div class="thumb"><a href="news.html"><img src="{{asset('build/assets/src/assets/img/category/HarryPotter.png')}}" alt="img"></a></div>
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
