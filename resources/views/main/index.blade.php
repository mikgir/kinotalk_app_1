<x-guest-layout xmlns:livewire="http://www.w3.org/1999/xhtml">
    <main>
        <!-- banner-area -->
        <section class="tgbanner__area">
            <div class="container">
                <div class="tgbanner__grid">
                    <div class="tgbanner__post big-post">
                        <div class="tgbanner__thumb tgImage__hover">
                            <a href="#">
                                {{$mainArticles[0]->getFirstMedia('sm_image')}}
                            </a>
                        </div>
                        <div class="tgbanner__content">
                            <ul class="tgbanner__content-meta list-wrap">
                                <li class="category"><a href="article-details.html">Категория: {{$mainArticles[0]->category->name}}</a></li>
                                <li><span class="by">Автор: </span>
                                    <a href="blog.html">
                                        {{$mainArticles[0]->user->name}}
                                    </a>
                                </li>
                                <li>{{$mainArticles[0]->craeted_at}}</li>
                            </ul>
                            <h2 class="title tgcommon__hover">
                                <a href="article-details.html">
                                    {{$mainArticles[0]->title}}
                                </a
                            ></h2>
                        </div>
                    </div>

                    <div class="tgbanner__side-post">

                        <div class="tgbanner__post small-post">
                            <div class="tgbanner__thumb tgImage__hover">
                                <a href="article-details.html">
                                    {{$mainArticles[1]->getFirstMedia('sm_image')}}
                                </a>
                            </div>
                            <div class="tgbanner__content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li class="category"><a href="article-details.html">Категория: {{$mainArticles[1]->category->name}}</a></li>
                                    <li><span class="by">Автор: </span>
                                        <a href="blog.html">
                                            {{$mainArticles[1]->user->name}}
                                        </a>
                                    </li>
                                </ul>
                                <h2 class="title tgcommon__hover"><a href="article-details.html">
                                       {{$mainArticles[1]->title}}
                                    </a></h2>
                            </div>
                        </div>
                        <div class="tgbanner__post small-post">
                            <div class="tgbanner__thumb tgImage__hover">
                                    <a href="article-details.html">
                                        {{$mainArticles[2]->getFirstMedia('sm_image')}}
                                    </a>
                            </div>
                            <div class="tgbanner__content">
                                <ul class="tgbanner__content-meta list-wrap">
                                   <li class="category">
                                       <a href="article-details.html">
                                           Категория: {{$mainArticles[2]->category->name}}
                                       </a>
                                   </li>
                                   <li><span class="by">Автор: </span>
                                       <a href="blog.html"> {{$mainArticles[2]->user->name}}
                                       </a>
                                   </li>
                                </ul>
                                <h2 class="title tgcommon__hover">
                                    <a href="article-details.html">
                                        {{$mainArticles[2]->title}}
                                    </a>
                                </h2>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- banner-area-end -->

        <!-- trending-area -->
        <section class="trending-post-area section__hover-line pt-25">
            <div class="container">
                <div class="section__title-wrap mb-40">
                    <div class="row align-items-end">
                        <div class="col-sm-6">
                            <div class="section__title">
                                <h3 class="section__main-title">Популярные статьи</h3>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="section__read-more text-start text-sm-end">
                                <a href="{{route('articles')}}">Читать все статьи<i class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="trending__slider">
                    <div class="swiper-container trending-active">
                        <div class="swiper-wrapper">
                            @foreach($popularArticles as $key=>$article)
                            <div class="swiper-slide">
                                <div class="trending__post">
                                    <div class="trending__post-thumb tgImage__hover">
{{--                                        <a href="#" class="addWish"><i class="fal fa-heart"></i></a>--}}
                                        <a href="{{route('articles.show', $article->id)}}">
                                            {{$article->getFirstMedia('sm_image')}}
                                        </a>
                                    </div>
                                    <div class="trending__post-content">
                                        <h4 class="title tgcommon__hover">
                                            <a href="{{route('articles.show', $article->id)}}">
                                                {{$article->title}}
                                            </a>
                                        </h4>
                                        <ul class="post__activity list-wrap">
                                            <li class="align-self-baseline">
                                                <livewire:reactions :model="$article"/>
                                            </li>
                                            <li class="align-self-baseline">
                                                <a href="{{route('articles.show', $article->id)}}">
                                                    <i class="fal fa-comment-dots"></i>
                                                    {{$article->comments->count()}}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- trending-area-end -->

        <!-- featured-area -->
        <section class="featured-post-area section__hover-line pt-75">
            <div class="container">
                <div class="section__title-wrap mb-40">
                    <div class="row align-items-end">
                        <div class="col-sm-6">
                            <div class="section__title">
                                <h3 class="section__main-title">Авторы</h3>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="section__read-more text-start text-sm-end">
                                <a href="author.html">Перейти ко&nbsp;всем авторам<i class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($authors as $key=>$author)
                    <div class="col-lg-4 col-sm-6">
                        <div class="featured__post">
                            <div class="featured__thumb" data-background=>{{$author->getFirstMedia('avatars')}}</div>
                            <div class="featured__content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li class="category"><a href="{{route('authors.show', $author->id)}}">Автор </a></li>
                                    <li><a href="{{route('authors.show', $author->id)}}">{{$author->name}}</a></li>
                                </ul>
                                @if($author->articles)
                                <h4 class="title tgcommon__hover">
                                    <a href="#">
{{--                                        {{$author->articles->last()->title}}--}}
                                    </a>
                                </h4>
                                @else
                                <h4>У автора статей пока нет</h4>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- featured-area-end -->

        <!-- hand-picked-area -->
        <section class="hand-picked-area black-bg fix section__hover-line pt-75 pb-80">
            <div class="container">
                <div class="section__title-wrap section__title-white mb-40">
                    <div class="row align-items-end">
                        <div class="col-sm-6">
                            <div class="section__title">
                                <h3 class="section__main-title">Последние новости</h3>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="section__read-more text-start text-sm-end">
                                <a href="article.html">Читать все новости<i class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="trending__slider dark-post-slider">
                <div class="swiper-container handpicked-active">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="trending__post">
                                <div class="trending__post-thumb tgImage__hover">
                                    <a href="#" class="addWish"><i class="fal fa-heart"></i></a>
                                    <a href="article-details.html"><img src="{{asset('build/assets/src/assets/img/blog/Oceans.png')}}" alt="img"></a>
                                </div>
                                <div class="trending__post-content">
                                    <ul class="tgbanner__content-meta list-wrap">
                                        <li class="category"><a href="article.html">Фильм "Океаны"</a></li>
                                        <li><span class="by">Автор</span> <a href="blog.html">Марина Ф.</a></li>
                                    </ul>
                                    <h4 class="title tgcommon__hover"><a href="article-details.html">«Океаны» предлагают зрителю заглянуть в волшебный...</a></h4>
                                    <ul class="post__activity list-wrap">
                                        <li><i class="fal fa-heart"></i> 1.0k</li>
                                        <li><a href="article-details.html"><i class="fal fa-comment-dots"></i> 128</a></li>
                                        <li><i class="fal fa-share"></i> 29</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="trending__post">
                                <div class="trending__post-thumb tgImage__hover">
                                    <a href="#" class="addWish"><i class="fal fa-heart"></i></a>
                                    <a href="article-details.html"><img src="{{asset('build/assets/src/assets/img/blog/marvel.png')}}" alt="img"></a>
                                </div>
                                <div class="trending__post-content">
                                    <ul class="tgbanner__content-meta list-wrap">
                                        <li class="category"><a href="article.html">Вселеная Marvel</a></li>
                                        <li><span class="by">Автор</span> <a href="blog.html">Леди кошка</a></li>
                                    </ul>
                                    <h4 class="title tgcommon__hover"><a href="article-details.html">Киновселенная Marvel — это поп-культурная глыба...</a></h4>
                                    <ul class="post__activity list-wrap">
                                        <li><i class="fal fa-heart"></i> 1.0k</li>
                                        <li><a href="article-details.html"><i class="fal fa-comment-dots"></i> 115</a></li>
                                        <li><i class="fal fa-share"></i> 19</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="trending__post">
                                <div class="trending__post-thumb tgImage__hover">
                                    <a href="#" class="addWish"><i class="fal fa-heart"></i></a>
                                    <a href="article-details.html"><img src="{{asset('build/assets/src/assets/img/blog/starWars.png')}}" alt="img"></a>
                                </div>
                                <div class="trending__post-content">
                                    <ul class="tgbanner__content-meta list-wrap">
                                        <li class="category"><a href="article.html">Мандалорец</a></li>
                                        <li><span class="by">Автор</span> <a href="blog.html">Грогу</a></li>
                                    </ul>
                                    <h4 class="title tgcommon__hover"><a href="article-details.html">Сериал Мандалорец, про некогда могучих...</a></h4>
                                    <ul class="post__activity list-wrap">
                                        <li><i class="fal fa-heart"></i> 1.2k</li>
                                        <li><a href="article-details.html"><i class="fal fa-comment-dots"></i> 110</a></li>
                                        <li><i class="fal fa-share"></i> 16</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="trending__post">
                                <div class="trending__post-thumb tgImage__hover">
                                    <a href="#" class="addWish"><i class="fal fa-heart"></i></a>
                                    <a href="article-details.html"><img src="{{asset('build/assets/src/assets/img/blog/TheLastofUs.png')}}" alt="img"></a>
                                </div>
                                <div class="trending__post-content">
                                    <ul class="tgbanner__content-meta list-wrap">
                                        <li class="category"><a href="article.html">Сериалы</a></li>
                                        <li><span class="by">Автор</span> <a href="blog.html">Тесс</a></li>
                                    </ul>
                                    <h4 class="title tgcommon__hover"><a href="article-details.html">После просмотра 1 сезона "The Last of Us"...</a></h4>
                                    <ul class="post__activity list-wrap">
                                        <li><i class="fal fa-heart"></i> 1.5k</li>
                                        <li><a href="article-details.html"><i class="fal fa-comment-dots"></i> 150</a></li>
                                        <li><i class="fal fa-share"></i> 42</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="trending__post">
                                <div class="trending__post-thumb tgImage__hover">
                                    <a href="#" class="addWish"><i class="fal fa-heart"></i></a>
                                    <a href="article-details.html"><img src="{{asset('build/assets/src/assets/img/blog/Fisher.png')}}" alt="img"></a>
                                </div>
                                <div class="trending__post-content">
                                    <ul class="tgbanner__content-meta list-wrap">
                                        <li class="category"><a href="article.html">Сериалы</a></li>
                                        <li><span class="by">Автор</span> <a href="blog.html">Любовь и Сериалы</a></li>
                                    </ul>
                                    <h4 class="title tgcommon__hover"><a href="article-details.html">Фишер, это жуткий сериал, про манька который убивал...</a></h4>
                                    <ul class="post__activity list-wrap">
                                        <li><i class="fal fa-heart"></i> 1.5k</li>
                                        <li><a href="article-details.html"><i class="fal fa-comment-dots"></i> 150</a></li>
                                        <li><i class="fal fa-share"></i> 32</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="trending__post">
                                <div class="trending__post-thumb tgImage__hover">
                                    <a href="#" class="addWish"><i class="fal fa-heart"></i></a>
                                    <a href="article-details.html"><img src="{{asset('build/assets/src/assets/img/blog/LordOfTheRings.png')}}" alt="img"></a>
                                </div>
                                <div class="trending__post-content">
                                    <ul class="tgbanner__content-meta list-wrap">
                                        <li class="category"><a href="article.html">Властелин колец</a></li>
                                        <li><span class="by">Автор:</span> <a href="blog.html">GANDALF</a></li>
                                    </ul>
                                    <h4 class="title tgcommon__hover"><a href="article-details.html">Сказания о Средиземье — это хроника Великой войны...</a></h4>
                                    <ul class="post__activity list-wrap">
                                        <li><i class="fal fa-heart"></i> 1.5k</li>
                                        <li><a href="article-details.html"><i class="fal fa-comment-dots"></i> 150</a></li>
                                        <li><i class="fal fa-share"></i> 32</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hand-picked-area-end -->

        <!-- stories-post-area -->
        <section class="stories-post-area section__hover-line pt-75 pb-40">
            <div class="container">
                <div class="section__title-wrap mb-40">
                    <div class="row align-items-end">
                        <div class="col-sm-6">
                            <div class="section__title">
                                <h3 class="section__main-title">Новости в мире кино</h3>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="section__read-more text-start text-sm-end">
                                <a href="news.html">Читать все новости <i class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-gutters-40">
                    <div class="col-md-6">
                        <div class="stories-post__item">
                            <div class="stories-post__thumb tgImage__hover">
                                <a href="news-details.html"><img src="{{asset('build/assets/src/assets/img/blog/news2.png')}}" alt="img"></a>
                            </div>
                            <div class="stories-post__content video__post-content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li class="category"><a href="news.html">Сериалы</a></li>
                                    <li>14.04.2023</li>
                                </ul>
                                <h3 class="title tgcommon__hover"><a href="news-details.html">Лучшие сериалы апреля 2023 года. Часть 1</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="stories-post__item">
                            <div class="stories-post__thumb tgImage__hover">
                                <a href="news-details.html"><img src="{{asset('build/assets/src/assets/img/blog/news3.png')}}" alt="img"></a>
                            </div>
                            <div class="stories-post__content video__post-content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li class="category"><a href="news.html">Кино</a></li>
                                    <li>14.04.2023</li>
                                </ul>
                                <h3 class="title tgcommon__hover"><a href="news-details.html">"Форсаж". История семьи Доминика Торетто</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="trending__post stories-small-post__item">
                            <div class="trending__post-thumb tgImage__hover">
                                <a href="news-details.html"><img src="{{asset('build/assets/src/assets/img/blog/news1.png')}}" alt="img"></a>
                            </div>
                            <div class="trending__post-content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li class="category"><a href="news.html">Франшизы</a></li>
                                    <li>14.04.2023</li>
                                </ul>
                                <h4 class="title tgcommon__hover"><a href="news-details.html">Звезда слэшера "Крик 6" Мелисса Баррера сыграет в триллере о монстре</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="trending__post stories-small-post__item">
                            <div class="trending__post-thumb tgImage__hover">
                                <a href="news-details.html"><img src="{{asset('build/assets/src/assets/img/blog/news4.png')}}" alt="img"></a>
                            </div>
                            <div class="trending__post-content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li class="category"><a href="news.html">Комиксы</a></li>
                                    <li>14.04.2023</li>
                                </ul>
                                <h4 class="title tgcommon__hover"><a href="news-details.html">Майкл Шеннон: Я был удивлен возвращению Зода в фильме "Флэш"</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="trending__post stories-small-post__item">
                            <div class="trending__post-thumb tgImage__hover">
                                <a href="news-details.html"><img src="{{asset('build/assets/src/assets/img/blog/news5.png')}}" alt="img"></a>
                            </div>
                            <div class="trending__post-content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li class="category"><a href="news.html">Франшизы</a></li>
                                    <li>14.04.2023</li>
                                </ul>
                                <h4 class="title tgcommon__hover"><a href="news-details.html">Что известно о четвертой серии "Джона Уика" и как он поднял экшн-франшизу?</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="trending__post stories-small-post__item">
                            <div class="trending__post-thumb tgImage__hover">
                                <a href="news-details.html"><img src="{{asset('build/assets/src/assets/img/blog/news6.png')}}" alt="img"></a>
                            </div>
                            <div class="trending__post-content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li class="category"><a href="news.html">Сериалы</a></li>
                                    <li>14.04.2023</li>
                                </ul>
                                <h4 class="title tgcommon__hover"><a href="news-details.html">Cпин-офф получила «Теория большого взрыва». О каких героях пойдет речь. </a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- stories-post-area-end -->
    </main>
</x-guest-layout>


