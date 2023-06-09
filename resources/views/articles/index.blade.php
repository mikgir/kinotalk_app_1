<x-guest-layout>
    <main>
        <!-- breadcrumb-area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content glass-m">
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
                                <div class="glass-m-p mb-3">
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
                                            <h3 class="title tgcommon__hover articles_text__w3"><a href="{{route('articles.show', $article->id)}}">{{$article->title}}</a></h3>
                                            <div class="latest__post-read-more">
                                                <a href="{{route('articles.show', $article->id)}}">Читать дальше <i class="far fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                              {{$articles->links('vendor.pagination.bootstrap-5')}}
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <aside class="blog-sidebar">
                            <livewire:category-widget/>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-details-area-end -->
    </main>
</x-guest-layout>
