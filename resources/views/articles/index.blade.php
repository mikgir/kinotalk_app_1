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
                                    <li class="breadcrumb-item"><a href="{{route('main')}}">Главная</a></li>
                                    <li class="breadcrumb-item active">Статьи</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- blog-details-area -->
        <section class="blog-details-area pt-80 pb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-7">
                        <div class="blog-post-wrapper">
                            @foreach($articles as $key=>$article)
                                    <div class="latest__post-item">
                                        <div class="latest__post-thumb tgImage__hover">
                                            <a href="{{route('articles.show', $article->id)}}">
                                                {{$article->getFirstMedia('sm_image')}}
                                            </a>
                                        </div>
                                    <div class="latest__post-content">
                                        <ul class="tgbanner__content-meta list-wrap">
                                            <li class="category"><a href="#">Категория: {{$article->category->name}}</a></li>
                                            <li><span class="by">Автор:</span><a href="{{route('authors.show', $article->user->id)}}">{{$article->user->name}}</a></li>
                                            <li>{{$article->created_at}}</li>
                                        </ul>
                                        <h3 class="title tgcommon__hover"><a href="{{route('articles.show', $article->id)}}">{{$article->title}}</a></h3>
                                        <p>{!! $article->body !!}</p>
                                        <div class="latest__post-read-more">
                                            <a href="{{route('articles.show', $article->id)}}">Читать дальше <i class="far fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                              {{$articles->links('vendor.pagination.bootstrap-5')}}
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
