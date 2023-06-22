<x-guest-layout xmlns:livewire="http://www.w3.org/1999/xhtml">
    <livewire:styles/>
    <livewire:scripts/>
    <main>
        <!-- banner-area -->
        <section class="tgbanner__area">
            <div class="container">
                <div class="tgbanner__grid">
                    <div class="tgbanner__post big-post">
                        <div class="tgbanner__thumb tgImage__hover">
                            <a href="{{route('articles.show', $mainArticles[0]->id)}}">
                                {{$mainArticles[0]->getFirstMedia('sm_image')}}
                            </a>
                        </div>
                        <div class="tgbanner__content">
                            <ul class="tgbanner__content-meta list-wrap">
                                <li class="category"><a href="{{route('articles.category') . '?page=' . $mainArticles[0]->category->id}}">Категория: {{$mainArticles[0]->category->name}}</a></li>
                                <li><span class="by">Автор: </span>
                                    <a href="{{route('authors.show', $mainArticles[0]->user->id)}}">
                                        {{$mainArticles[0]->user->name}}
                                    </a>
                                </li>
                                <li>{{$mainArticles[0]->craeted_at}}</li>
                            </ul>
                            <h2 class="title tgcommon__hover">
                                <a href="{{route('articles.show', $mainArticles[0]->id)}}">
                                    {{$mainArticles[0]->title}}
                                </a
                            ></h2>
                        </div>
                    </div>

                    <div class="tgbanner__side-post">
                        <div class="tgbanner__post small-post">
                            <div class="tgbanner__thumb tgImage__hover">
                                <a href="{{route('articles.show', $mainArticles[1]->id)}}">
                                    {{$mainArticles[1]->getFirstMedia('sm_image')}}
                                </a>
                            </div>
                            <div class="tgbanner__content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li class="category"><a href="{{route('articles.category') . '?page=' . $mainArticles[1]->category->id}}">Категория: {{$mainArticles[1]->category->name}}</a></li>
                                    <li><span class="by">Автор: </span>
                                        <a href="{{route('authors.show', $mainArticles[1]->user->id)}}">
                                            {{$mainArticles[1]->user->name}}
                                        </a>
                                    </li>
                                </ul>
                                <h2 class="title tgcommon__hover articles_text__w3"><a href="{{route('articles.show', $mainArticles[1]->id)}}">
                                       {{$mainArticles[1]->title}}
                                    </a></h2>
                            </div>
                        </div>
                        <div class="tgbanner__post small-post">
                            <div class="tgbanner__thumb tgImage__hover">
                                    <a href="{{route('articles.show', $mainArticles[2]->id)}}">
                                        {{$mainArticles[2]->getFirstMedia('sm_image')}}
                                    </a>
                            </div>
                            <div class="tgbanner__content">
                                <ul class="tgbanner__content-meta list-wrap">
                                   <li class="category">
                                       <a href="{{route('articles.category') . '?page=' . $mainArticles[2]->category->id}}">
                                           Категория: {{$mainArticles[2]->category->name}}
                                       </a>
                                   </li>
                                   <li><span class="by">Автор: </span>
                                       <a href="{{route('authors.show', $mainArticles[2]->user->id)}}"> {{$mainArticles[2]->user->name}}
                                       </a>
                                   </li>
                                </ul>
                                <h2 class="title tgcommon__hover articles_text__w3">
                                    <a href="{{route('articles.show', $mainArticles[2]->id)}}">
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
                <div class="trending__slider ">
                    <div class="swiper-container trending-active flex-column justify-content-between">
                        <div class="swiper-wrapper">
                            @foreach($popularArticles as $key=>$article)
                            <div class="swiper-slide ">
                                <div class="trending__post ">
                                    <div class="trending__post-thumb tgImage__hover">
{{--                                        <a href="#" class="addWish"><i class="fal fa-heart"></i></a>--}}
                                        <a href="{{route('articles.show', $article->id)}}">
                                            {{$article->getFirstMedia('sm_image')}}
                                        </a>
                                    </div>
                                    <div class="trending__post-content post-content__justify">
                                            <h4 class="title tgcommon__hover title__text-w3">
                                                <a href="{{route('articles.show', $article->id)}}">
                                                    {{$article->title}}
                                                </a>
                                            </h4>

                                            <ul class="post__activity list-wrap">
                                                <li class="align-self-baseline">
{{--                                                    <a href="{{route('articles.show', $article->id)}}" >--}}
{{--                                                        <i class="fa fa-heart"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <livewire:reactions :model="$article"/>--}}
                                                </li>
                                                <li class="align-self-baseline">
                                                    <a href="{{route('articles.show', $article->id)}}" >
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
                                <a href="{{route('authors')}}">Перейти ко&nbsp;всем авторам<i class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($authors as $key=>$author)
                    <div class="col-lg-3 col-sm-6 ">
                        <div class="featured__post flex-column">
                            <div class="featured__thumb trending__post-thumb tgImage__hover">
                                <a href="{{route('authors.show', $author->id)}}">
                                    {{$author->getFirstMedia('avatars')}}
                                </a>
                            </div>

                            <div class="featured__content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li class="category"> <a href="{{route('authors.show', $author->id)}}">{{$author->name}}</a></li>
                                </ul>
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
                    <div class="row align-items-end" >
                        <div class="col-sm-6">
                            <div class="section__title">
                                <h3 class="section__main-title">Последние новости</h3>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="section__read-more text-start text-sm-end">
                                <a href="{{route('news')}}">Читать все новости<i class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="trending__slider dark-post-slider">
                <div class="swiper-container trending-active">
                    <div class="swiper-wrapper" >
                        @foreach($lastNews as $key=>$news)
                        <div class="swiper-slide">
                            <div class="trending__post">
                                <div class="trending__post-thumb tgImage__hover tgImage__a">
                                    <a href="#" class="addWish addWis__w3"><i class="fal fa-heart"></i></a>
                                    <a href="{{route('news.show', $news->id)}}">
                                        <img src="{{asset($news->image)}}" alt="img">
                                    </a>
                                </div>
                                <div class="trending__post-content">

                                    <h4 class="title tgcommon__hover news_text__w3">


                                        <a href="{{route('news.show', $news->id)}}">
                                            {{$news->title}}
                                        </a>
                                    </h4>
                                    <ul class="post__activity list-wrap">
                                        <li>
{{--                                            <livewire:reactions :model="$news"/>--}}
                                        </li>
                                        <li>
                                            <a href="{{route('news.show', $news->id)}}">
                                                <i class="fal fa-comment-dots"></i>
                                                {{$news->comments->count()}}
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
        </section>
        <!-- hand-picked-area-end -->

        <!-- stories-post-area -->
        <section class="stories-post-area section__hover-line pt-75 pb-40">
            <div class="container">
                <div class="section__title-wrap mb-40">
                    <div class="row align-items-end">
                        <div class="col-sm-6">
                            <div class="section__title">
                                <h3 class="section__main-title">Популярные новости кино</h3>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="section__read-more text-start text-sm-end">
                                <a href="{{route('news')}}">Читать все новости <i class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-gutters-40">
                    <div class="col-md-6">
                        <div class="stories-post__item">
                            <div class="stories-post__thumb tgImage__hover tgImage__a">
                                <a href="{{route('news.show', $popularNews[0]->id)}}">
                                    <img src="{{asset($popularNews[0]->image)}}" alt="img">
                                </a>
                            </div>
                            <div class="stories-post__content video__post-content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li>{{$popularNews[0]->created_at}}</li>
                                </ul>
                                <h3 class="title tgcommon__hover news_text__w4">
                                    <a href="{{route('news.show', $popularNews[0]->id)}}">
                                        {{$popularNews[0]->title}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="stories-post__item">
                            <div class="stories-post__thumb tgImage__hover tgImage__a">
                                <a href="{{route('news.show', $popularNews[1]->id)}}">
                                    <img src="{{asset($popularNews[1]->image)}}" alt="img">
                                </a>
                            </div>
                            <div class="stories-post__content video__post-content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li>{{$popularNews[1]->created_at}}</li>
                                </ul>
                                <h3 class="title tgcommon__hover news_text__w4">
                                    <a href="{{route('news.show', $popularNews[1]->id)}}">
                                        {{$popularNews[1]->title}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="trending__post stories-small-post__item">
                            <div class="trending__post-thumb tgImage__hover">
                                <a href="{{route('news.show', $popularNews[2]->id)}}"><img src="{{asset($popularNews[2]->image)}}" alt="img"></a>
                            </div>
                            <div class="trending__post-content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li>{{$popularNews[2]->created_at}}</li>
                                </ul>
                                <h4 class="news_text__w5">
                                    <a href="{{route('news.show', $popularNews[2]->id)}}">
                                       {{$popularNews[2]->title}}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="trending__post stories-small-post__item">
                            <div class="trending__post-thumb tgImage__hover">
                                <a href="{{route('news.show', $popularNews[3]->id)}}"><img src="{{asset($popularNews[3]->image)}}" alt="img"></a>
                            </div>
                            <div class="trending__post-content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li>{{$popularNews[3]->created_at}}</li>
                                </ul>
                                <h4 class=" news_text__w5">
                                    <a href="{{route('news.show', $popularNews[3]->id)}}">
                                        {{$popularNews[3]->title}}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="trending__post stories-small-post__item">
                            <div class="trending__post-thumb tgImage__hover">
                                <a href="{{route('news.show', $popularNews[4]->id)}}"><img src="{{asset($popularNews[4]->image)}}" alt="img"></a>
                            </div>
                            <div class="trending__post-content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li>{{$popularNews[4]->created_at}}</li>
                                </ul>
                                <h4 class=" news_text__w5">
                                    <a href="{{route('news.show', $popularNews[4]->id)}}">
                                        {{$popularNews[4]->title}}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="trending__post stories-small-post__item">
                            <div class="trending__post-thumb tgImage__hover">
                                <a href="{{route('news.show', $popularNews[5]->id)}}"><img src="{{asset($popularNews[5]->image)}}" alt="img"></a>
                            </div>
                            <div class="trending__post-content">
                                <ul class="tgbanner__content-meta list-wrap">
                                    <li>{{$popularNews[5]->created_at}}</li>
                                </ul>
                                <h4 class=" news_text__w5">
                                    <a href="{{route('news.show', $popularNews[5]->id)}}">
                                        {{$popularNews[5]->title}}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- stories-post-area-end -->
    </main>
</x-guest-layout>


