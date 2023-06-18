<x-guest-layout xmlns:livewire="http://www.w3.org/1999/html">
    <livewire:styles/>
    <livewire:scripts/>
    <main>
        <!-- breadcrumb-area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row" >
                    <div class="col-12">
                        <div class="breadcrumb-content glass-m">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('main')}}">Главная</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('articles')}}">Статьи</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$article->title}}</li>
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
                                <li class="category">{{$article->category->name}}</li>
                                <li><span class="by">Автор:</span><a href="{{route('authors.show', $article->user->id)}}">{{$article->user->name}}</a></li>
                                <li>{{$article->created_at}}</li>
                            </ul>
                            <h2 class="title">{{$article->title}}</h2>
                            <div class="blog-details-thumb">
                                {{$article->getFirstMedia('sm_image')}}
                            </div>
                            <div class="blog-details-content">
                                <p>
                                    {!! $article->body !!}
                                </p>
                            </div>

                            <livewire:reactions :model="$article"/>

                            <div class="blog-details-bottom">
                                <div class="row align-items-baseline">
                                    <div class="col-xl-6 col-md-7">
                                        <div class="blog-details-tags">
                                            <ul class="list-wrap mb-0">
                                                <li><a href="{{route('articles.category') . '?page=' . $article->category->id}}">{{$article->category->name}}</a></li>
                                                <li><a href="{{route('authors')}}">Авторы</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <livewire:comments :model="$article"/>
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
                                                <a href="{{route('articles.show', $previousArticle->id)}}">
                                                    {{$previousArticle->getFirstMedia('sm_image')}}
                                                </a>
                                            </div>
                                            <div class="content">
                                                <span>Предыдущая статья</span>
                                                <h5 class="title tgcommon__hover"><a href="{{route('articles.show', $previousArticle->id)}}">{{Str::limit($previousArticle->title, $limit = 40, ' ...')}}</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-8 col-md-6">
                                        <div class="pn-post-item">
                                            <div class="thumb">
                                                <a href="{{route('articles.show', $nextArticle->id)}}">
                                                    {{$nextArticle->getFirstMedia('sm_image')}}
                                                </a>
                                            </div>
                                            <div class="content">
                                                <span>Следующая статья</span>
                                                <h5 class="title tgcommon__hover"><a href="{{route('articles.show', $nextArticle->id)}}">{{Str::limit($nextArticle->title, $limit = 40, ' ...')}}</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <aside class="blog-sidebar">
                            <livewire:user-widget :user="$article->user"/>
                            <livewire:category-widget/>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-details-area-end -->
    </main>
</x-guest-layout>
